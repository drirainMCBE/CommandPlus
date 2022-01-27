<?php

declare(strict_types=1);

namespace RoMo\CommandPlus\parameter;

use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;

class MessageParameter extends Parameter{
    public function __construct(string $name, bool $isOptional = false){
        parent::__construct($name, $isOptional);
        $this->paramType |= AvailableCommandsPacket::ARG_TYPE_MESSAGE;
    }
    public function parse(string $argument){
        //TODO
    }
}