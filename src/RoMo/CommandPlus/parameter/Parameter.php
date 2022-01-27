<?php

declare(strict_types=1);

namespace RoMo\CommandPlus\parameter;

use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;
use pocketmine\network\mcpe\protocol\types\command\CommandParameter;

abstract class Parameter extends CommandParameter{
    /** @var int */
    protected int $size = 1;

    public function __construct(string $name, bool $isOptional = false){
        $this->paramName = $name;
        $this->isOptional = $isOptional;
        $this->paramType = AvailableCommandsPacket::ARG_FLAG_VALID;
    }
    public function getSize() : int{
        return $this->size;
    }
    public abstract function parse(string $argument);
}