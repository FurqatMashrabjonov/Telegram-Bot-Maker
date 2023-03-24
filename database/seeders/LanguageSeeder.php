<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'Python', 'key' => 'python', 'extension' => '.py'],
            ['name' => 'Java', 'key' => 'java', 'extension' => '.java'],
            ['name' => 'Ruby', 'key' => 'ruby', 'extension' => '.rb'],
            ['name' => 'PHP', 'key' => 'php', 'extension' => '.php'],
            ['name' => 'JavaScript', 'key' => 'javascript', 'extension' => '.js'],
            ['name' => 'C#', 'key' => 'c_sharp', 'extension' => '.cs'],
            ['name' => 'Go', 'key' => 'go', 'extension' => '.go'],
            ['name' => 'Swift', 'key' => 'swift', 'extension' => '.swift'],
            ['name' => 'Kotlin', 'key' => 'kotlin', 'extension' => '.kt'],
            ['name' => 'Rust', 'key' => 'rust', 'extension' => '.rs']
        ];

        DB::table('languages')->insert($languages);

    }
}
