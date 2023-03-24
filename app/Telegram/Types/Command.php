<?php

namespace App\Telegram\Types;

use App\Telegram\Component;

class Command
{
    public string $command;
    public array $actions;
    public array $action_components;
    public Component $component;

    public function __construct($command, $actions, $function = null)
    {
        $this->command = $command;
        $this->actions = $actions;
        $this->fillEachAction();
    }


    public function fillEachAction(): void
    {
        foreach ($this->actions as $action) {
            $this->action_components[] = new Component($action->action, (array)$action->args);
        }
    }

}
