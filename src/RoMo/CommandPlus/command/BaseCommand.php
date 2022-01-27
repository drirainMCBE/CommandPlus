<?php

declare(strict_types=1);

namespace RoMo\CommandPlus\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use RoMo\CommandPlus\overload\Overload;

abstract class BaseCommand extends Command{

    /** @var Overload[] */
    protected array $overloads = [];

    public abstract function execute(CommandSender $sender, string $commandLabel, array $args);

    public function addOverload(Overload $overload) : void{
        $this->overloads[] = $overload;
    }

    public function hasOverloads() : bool{
        return count($this->getOverloads()) > 0;
    }

    public function getOverloads() : array{
        return $this->overloads;
    }
}