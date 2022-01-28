<?php

namespace RoMo\CommandPlus\parameter;

use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;

class TargetParameter extends Parameter{
    public function __construct(string $name, bool $isOptional = false){
        parent::__construct($name, $isOptional);
        $this->paramType |= AvailableCommandsPacket::ARG_TYPE_TARGET;
    }
}