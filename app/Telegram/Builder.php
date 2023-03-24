<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Log;

class Builder
{


    protected string $tree;
    public object $parsed_tree;
    public function __construct($tree = null)
    {
        $this->tree = file_get_contents($tree ?? public_path('tree\main.json'));
        $this->parsed_tree = json_decode($this->tree);

    }


    public function build(){
        $parsed = (new Parser($this->parsed_tree))->parse();
        dd($parsed);
    }

}
