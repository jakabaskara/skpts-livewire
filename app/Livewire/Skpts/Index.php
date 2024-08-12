<?php

namespace App\Livewire\Skpts;

use App\Models\Skpts;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.skpts.index');
    }

    public function closeModal()
    {
        $this->js('$dispatch("close-modal", { id: "edit-user" })');
    }
}
