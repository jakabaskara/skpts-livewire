<?php

namespace App\Livewire;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Loginv2 extends Component implements HasForms
{
    use InteractsWithForms;
    public $email;
    public $password;
    public ?array $data = [];
    public $avatar;
    public function mount(): void
    {
        $this->form->fill([
            'email' => '',
            'password' => '',
        ]);
    }
    protected function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->placeholder('your@mail.com'),

                TextInput::make('password')
                    ->required()
                    ->maxLength(255)
                    ->password()
                    ->placeholder('*****'),
            ])
            ->columns(1)
            ->statePath('data');

    }
    #[Layout("layouts.guest")]
    public function render()
    {
        return view('livewire.loginv2');
    }

    public function submit()
    {
        if (Auth::attempt($this->data)) {
            return redirect()->route('dashboard.index');
        }
        ;

        throw ValidationException::withMessages([
            'data.email' => __('Username dan Password Anda Salah'),
        ]);
    }
}
