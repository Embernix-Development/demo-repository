<?php

namespace Database\Seeders;

use App\Support\Defaults\BlogDefaults;
use App\Support\Defaults\DefaultContent;
use App\Support\Defaults\KnowledgebaseDefaults;
use App\Support\Defaults\SettingsDefaults;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        SettingsDefaults::seed();

        DefaultContent::seed();

        BlogDefaults::seed();

        KnowledgebaseDefaults::seed();

        if (config('rino-demo.enabled') && filled(config('rino-demo.password'))) {
            $user = \App\Models\User::firstOrNew([
                'email' => config('rino-demo.email'),
            ]);
            $user->name = 'Rino Demo';
            $user->password = config('rino-demo.password');
            $user->is_admin = true;
            $user->save();
        }
    }
}
