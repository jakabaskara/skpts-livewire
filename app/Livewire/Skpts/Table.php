<?php

namespace App\Livewire\Skpts;

use App\Models\Skpts;
use Carbon\Carbon;
use Filament\Tables\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class Table extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $modalData;

    protected function buildQuery()
    {
        return Skpts::query()
            ->with('kutipan')
            ->withCount('kutipan');

    }

    public function placeholder()
    {
        return view('livewire.skpts.placeholder');
    }

    protected function getTableQuery()
    {
        return $this->buildQuery();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('tanggal')
                ->label('Tanggal')
                ->sortable()
                ->formatStateUsing(function ($state) {
                    Carbon::setLocale('id');

                    return Carbon::parse($state)->translatedFormat('d F Y');
                }),

            TextColumn::make('no_agenda')
                ->label('No Agenda')
                ->searchable()
                ->wrap(),

            TextColumn::make('no_skpts')
                ->label('No SKTPS')
                ->sortable()
                ->wrap(),

            TextColumn::make('tentang')
                ->label('Tentang')
                ->sortable()
                ->wrap(),

            TextColumn::make('kutipan_count')
                ->label('Kutipan')
                ->sortable()
                ->alignCenter(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')
                ->icon('heroicon-o-eye')
                ->label('Lihat')
                ->action(function ($record) {
                    $this->modalData = $record->kutipan;
                    $this->dispatch('open-modal', id: 'view-kutipan');
                }),

            Action::make('view_pdf')
                ->icon('heroicon-o-document')
                ->label('PDF')
                ->color('cyan')
                ->url(fn($record) => route('download.skpts', ['fileName' => $record->file_arsip]))
                ->openUrlInNewTab(),
        ];
    }
    public function render()
    {
        return view('livewire.skpts.table');
    }
}
