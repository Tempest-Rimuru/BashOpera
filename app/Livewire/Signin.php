<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Signin extends Component
{
    public $login;
    public $password;

    public function auth()
    {
        $this->validate([
            'login' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($this->login === 'admin@mail.ru' && $this->password === 'admin123') {
            Auth::loginUsingId(1);
            return redirect()->route('admin.news')->with('success', 'Вы успешно авторизовались!');
        } else {
            session()->flash('error', 'Неправильный логин или пароль.');
        }
    }

    public function render()
    {
        return view('livewire.signin');
    }
}
