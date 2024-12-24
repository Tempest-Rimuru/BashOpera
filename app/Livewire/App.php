<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class App extends Component
{
    public function render()
    {
        return view('components.layouts.app');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Вы вышли из аккаунта');
    }
}
