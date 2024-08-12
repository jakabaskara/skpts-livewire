<?php

namespace App\Livewire\Karyawan;

use App\Models\Karyawan;
use App\Models\Kutipan;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use stdClass;

class Table extends Component implements HasTable, HasForms
{
    use InteractsWithForms;
    use InteractsWithTable;
    #[Lazy()]

    public $modalData;

    public function placeholder()
    {
        return view('livewire.skpts.placeholder');
    }
    protected function buildQuery()
    {
        return Karyawan::query()
            ->leftJoin('kutipan', 'kutipan.nik_sap', 'karyawan.nik_sap')
            ->select(
                'karyawan.id',
                'karyawan.name',
                'karyawan.nik_sap',
                'karyawan.jabatan',
                DB::raw('COUNT(kutipan.nik_sap) AS kutipan')
            )->groupBy(
                'karyawan.id',
                'karyawan.name',
                'karyawan.nik_sap',
                'karyawan.jabatan',
            );

    }
    protected function getTableQuery()
    {
        return $this->buildQuery();
    }
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('index')
                ->state(
                    static function (HasTable $livewire, stdClass $rowLoop): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * (
                                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                )
                ->label('#'),

            TextColumn::make("nik_sap")
                ->searchable()
                ->sortable()
                ->label("NIK"),

            TextColumn::make("name")
                ->searchable()
                ->sortable()
                ->label("Nama"),

            TextColumn::make("jabatan")
                ->searchable()
                ->sortable()
                ->label("Jabatan"),

            TextColumn::make("kutipan")
                ->label('Kutipan')
                ->sortable(),

        ];
    }

    public function getTableActions(): array
    {
        return [
            Action::make('view')
                ->icon('heroicon-o-eye')
                ->label('Lihat')
                ->action(function ($record) {
                    $kutipan = Kutipan::query()
                        ->with('skpts')
                        ->where('nik_sap', $record->nik_sap)
                        ->get();

                    $this->modalData = $kutipan;
                    $this->dispatch('open-modal', id: 'view-kutipan');
                }),

        ];
    }
    public function render()
    {
        return view('livewire.karyawan.table');
    }
}
