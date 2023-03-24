<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Log;

class Component
{
    public array $args;
    public string $name;
    public string $ready;
    public function __construct(string $name, array $args)
    {
        $this->args = $args;
        $this->name = $name;
        $this->content();
    }

    public function content(): string
    {
        $this->ready = $this->filler();
        return $this->ready;
    }

    function filler(): string
    {
        $component = \App\Models\Component::query()->where('name', $this->name)->first();
        $component = $component->body;
        foreach ($this->args as $key => $arg) {
            $tmp = explode("{{{$key}}}", $component);
            $component = $tmp[0] . $arg . $tmp[1];
        }
        return $component;
    }
}
