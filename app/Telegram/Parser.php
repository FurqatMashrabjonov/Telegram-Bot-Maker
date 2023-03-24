<?php

namespace App\Telegram;

use App\Telegram\Types\Command;

class Parser
{

    protected object $tree;

    public function __construct($tree)
    {
        $this->tree = $tree;
    }


    public function parse()
    {
        $tmp = [];
        foreach ($this->tree->commands as $command){
            $tmp[] = new Command($command->command, $command->actions);
        }
        return $tmp;
    }

}
