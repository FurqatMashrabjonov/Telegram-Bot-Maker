<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Framework;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Test User',
            'email' => 'furqat@mail.ru',
            'password' => Hash::make('furqat12345')
        ]);
        $this->call(TemplateSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(FrameworkSeeder::class);
//        $this->call(ComponentSeeder::class);
    }
}
