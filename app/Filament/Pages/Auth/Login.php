<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Session;

class Login extends BaseLogin
{
    public function mount(): void
    {
        parent::mount();

        if (session()->has('error')) {
            Notification::make()
                ->danger()
                ->title('Login Failed')
                ->body(session('error'))
                ->send();
        }
    }
}