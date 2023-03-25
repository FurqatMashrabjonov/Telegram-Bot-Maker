<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            [
                'language_id' => 1,
                'framework_id' => 1,
                'name' => 'message',
                'body' => '$bot->sendMessage($message->getChat()->getId(), "{{message}}");'
            ]
        ];

        DB::table('components')->insert($components);
    }
}
