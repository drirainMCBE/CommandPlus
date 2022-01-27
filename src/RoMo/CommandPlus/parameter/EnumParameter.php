<?php

declare(strict_types=1);

namespace RoMo\CommandPlus\parameter;

use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;
use pocketmine\network\mcpe\protocol\types\command\CommandEnum;

class EnumParameter extends Parameter{

    /** @var array */
    protected array $enumValues;

    public function __construct(string $name, string $enumType, array $enumValues, bool $isOptional = false){
        parent::__construct($name, $isOptional);
        $this->paramType |= AvailableCommandsPacket::ARG_FLAG_ENUM;
        $this->enum = new CommandEnum($enumType, $enumValues);
    }
    public function parse(string $argument){
        // TODO: Implement parse() method.
    }
}