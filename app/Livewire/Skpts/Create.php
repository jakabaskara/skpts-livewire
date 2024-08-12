<?php

namespace App\Livewire\Skpts;

use App\Models\Karyawan;
use App\Models\Kutipan;
use App\Models\Skpts;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component implements HasForms
{
    use InteractsWithForms;
    public ?array $data = [];
    public ?array $karyawans = [];
    public function mount()
    {
        $karyawans = Karyawan::select('name', 'nik_sap', 'jabatan')->get();
        foreach ($karyawans as $index => $karyawan) {
            $this->karyawans[$karyawan['nik_sap'].'|'.$karyawan['name'].'|'.$karyawan['jabatan']] = $karyawan['nik_sap'].' - '.$karyawan['name'];
        }
        $this->form->fill([
            'no_agenda' => '',
            'no_skpts' => '',
            'tanggal' => '',
            'tentang' => '',
            'file_arsip' => '',
            'kutipans' => $this->skpts->kutipans ?? [
                ['no_kutipan' => '', 'nik_sap' => '', 'nama' => '', 'jabatan_lama' => '', 'jabatan_baru' => '', 'keterangan' => '', 'status' => '', 'file_kutipan' => ''],
            ],
        ]);
    }
    public function render()
    {
        return view('livewire.skpts.create');
    }

    protected function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Grid::make(2)
                        ->schema([
                            TextInput::make('no_agenda')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('Nomor Agenda'),

                            TextInput::make('no_skpts')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('Nomor SKPTS'),

                            DatePicker::make('tanggal')
                                ->required()
                                ->native(false),

                            Textarea::make('tentang')
                                ->required(),

                            FileUpload::make('file_arsip')
                                ->acceptedFileTypes(['application/pdf'])
                                ->disk('local-skpts')
                                ->required(),
                        ]),
                    Repeater::make('kutipans')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('no_kutipan')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('No Kutipan'),

                                    Select::make('nik_sap')
                                        ->required()
                                        ->searchable()
                                        ->placeholder('NIK SAP')
                                        ->options($this->karyawans)
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, Set $set) {
                                            $parts = explode('|', $state);
                                            $set('nama', $parts[1]);
                                            $set('jabatan_lama', $parts[2]);
                                        }),

                                    TextInput::make('nama')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Nama')
                                        ->disabled(),

                                    TextInput::make('jabatan_lama')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Jabatan Lama')
                                        ->disabled(),

                                    TextInput::make('jabatan_baru')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Jabatan Baru'),

                                    Textarea::make('keterangan')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Keterangan'),

                                    TextInput::make('status')
                                        ->required()
                                        ->maxLength(255),

                                    FileUpload::make('file_kutipan')
                                        ->required()
                                        ->disk('local-kutipan')
                                        ->acceptedFileTypes(['application/pdf']),
                                ]),
                        ])
                        ->minItems(1)
                        ->defaultItems(1)
                        ->addActionLabel('Tambah Kutipan')
                        ->columns(2)
                        ->label('Kutipan'),
                ],
            )->statePath('data');
    }

    protected function repeater(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('kutipans')
                    ->schema([
                        TextInput::make('nama'),
                    ])
            ]);
    }

    public function submit()
    {
        $data = $this->form->getState();
        $dataSk = [
            'no_agenda' => $data['no_agenda'],
            'no_skpts' => $data['no_skpts'],
            'tanggal' => $data['tanggal'],
            'tentang' => $data['tentang'],
            'file_arsip' => $data['file_arsip'],
        ];

        DB::transaction(function () use ($data, $dataSk) {
            $dataKutipan = [];
            $id_skpts = Skpts::create($dataSk);

            foreach ($data['kutipans'] as $index => $kutipan) {
                $dataKutipan[$index]['id'] = Str::uuid();
                $dataKutipan[$index]['skpts_id'] = $id_skpts->id;
                $dataKutipan[$index]['no_kutipan'] = $kutipan['no_kutipan'];
                $dataKutipan[$index]['nik_sap'] = explode('|', $kutipan['nik_sap'])[0];
                $dataKutipan[$index]['nama'] = explode('|', $kutipan['nik_sap'])[1];
                $dataKutipan[$index]['jabatan_lama'] = explode('|', $kutipan['nik_sap'])[2];
                $dataKutipan[$index]['jabatan_baru'] = $kutipan['jabatan_baru'];
                $dataKutipan[$index]['keterangan'] = $kutipan['keterangan'];
                $dataKutipan[$index]['status'] = $kutipan['status'];
                $dataKutipan[$index]['file_kutipan'] = $kutipan['file_kutipan'];
            }
            Kutipan::insert($dataKutipan);
        });

        $this->form->fill();
        return $this->redirect('/skpts', navigate: true);
    }

}
