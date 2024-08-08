<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule(["required", "email"])]
    public $email;

    #[Rule(["required"])]
    public $password;

    #[Layout("layouts.guest")]
    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {

        if (Auth::attempt($this->validate())) {
            return redirect()->route('dashboard.index');
        }

        throw ValidationException::withMessages([
            'email' => __('Username dan Password Anda Salah'),
        ]);
    }
}
