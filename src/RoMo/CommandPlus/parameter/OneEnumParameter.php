<?php

declare(strict_types=1);

namespace RoMo\CommandPlus\parameter;

class OneEnumParameter extends EnumParameter{
    public function __construct(string $name, bool $isOptional = false){
        parent::__construct($name, $name, [$name], $isOptional);
    }
}