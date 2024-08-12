<?php

namespace App\Livewire\Karyawan;

use App\Models\Karyawan;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Livewire\Component;
use stdClass;

class Index extends Component implements HasTable, HasForms
{
    use InteractsWithForms;
    use InteractsWithTable;
    protected function buildQuery()
    {
        return Karyawan::query()
            ->withCount('kutipan');

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

            TextColumn::make("kutipan_count")
                ->label('Kutipan')
                ->sortable(),

        ];
    }
    public function render()
    {
        return view('livewire.karyawan.index');
    }
}
