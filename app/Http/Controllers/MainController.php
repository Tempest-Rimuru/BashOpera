<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function auth(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('login', 'password');

        if ($credentials['login'] === 'admin@mail.ru' && $credentials['password'] === 'admin123') {
            Auth::attempt($credentials);
            return redirect()->route('admin.news')->with('success', 'Вы успешно авторизовались');
        } else {
            return redirect()->route('signin')->with('error', 'Неверные логин или пароль');
        }
    }
}
