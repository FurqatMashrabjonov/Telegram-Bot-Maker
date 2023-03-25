<?php

namespace Database\Seeders;

use App\Models\Framework;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $frameworks = [
            [
                'name' => 'Native PHP',
                'language_id' => 4,
                'url' => 'https://php.net'
            ],
            [
                'url' => 'https://github.com/TelegramBot/Api',
                'name' => 'telegram-bot/api',
                'language_id' => 4
            ]
        ];
        Framework::query()->insert($frameworks);
    }
}
