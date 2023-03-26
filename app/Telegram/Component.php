<?php

namespace App\Telegram;

use App\Models\Template;
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
        $language_id = 4;
        $framework_id = 2;
        $template = Template::query()->where('name', $this->name)->first();
        $component = \App\Models\Component::query()
            ->where('template_id', $template->id)
            ->where('language_id', $language_id)
            ->where('framework_id', $framework_id)
            ->first();
        $component = $component->body;
        foreach ($this->args as $key => $arg) {
            $tmp = explode("{{{$key}}}", $component);
            $component = $tmp[0] . $arg . $tmp[1];
        }
        return $component;
    }
}
