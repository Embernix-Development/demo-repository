<?php

namespace App\Filament\Pages;

use Filament\Auth\Pages\Login;

class DemoLogin extends Login
{
    public function mount(): void
    {
        parent::mount();

        if (config('rino-demo.enabled') && filled(config('rino-demo.password'))) {
            $this->form->fill([
                'email' => config('rino-demo.email'),
                'password' => config('rino-demo.password'),
                'remember' => false,
            ]);
        }
    }
}
