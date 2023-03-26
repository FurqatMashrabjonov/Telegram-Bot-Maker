<?php

namespace App\Telegram\Types;

use App\Telegram\Component;
use Illuminate\Support\Facades\Log;

class Command
{
    public string $command;
    public array $actions;
    public array $action_components;
    public Component $component;
    public string $ready_filled_component;

    public function __construct($command, $actions, $function = null)
    {
        $this->command = $command;
        $this->actions = $actions;
        $this->fillLayout();
    }


    public function fillLayout(){
        $str = '';
        foreach ($this->fillEachAction() as $action){
            $str .= $action->ready . PHP_EOL;
        }
        $component = new Component('command', ['command' => $this->command, 'content' => $str]);
        $this->ready_filled_component = $component->ready;
        return $component;
    }

    public function fillEachAction(): array
    {
        foreach ($this->actions as $action) {
            $this->action_components[] = new Component($action->action, (array)$action->args);
        }
        return $this->action_components;
    }

}
