<?php

declare(strict_types=1);

namespace RoMo\CommandPlus\overload;

use pocketmine\command\utils\CommandException;
use RoMo\CommandPlus\parameter\Parameter;

class Overload{

    /** @var Parameter[] */
    protected array $parameters = [];

    /** @var string|null */
    protected ?string $permission = null;

    public function getParameter(string $name) : ?Parameter{
        foreach($this->parameters as $parameter){
            if($parameter->paramName === $name){
                return $parameter;
            }
        }
        return null;
    }

    public function getParameters() : array{
        return $this->parameters;
    }

    public function addParameter(Parameter $parameter) : self{
        foreach($this->parameters as $existParameter){
            if($parameter->paramName === $existParameter->paramName){
                throw new CommandException("Cannot add multiple parameters that have same name");
            }
        }
        $this->parameters[] = $parameter;
        return $this;
    }

    public function removeParameter(Parameter $removingParameter) : self{
        foreach($this->parameters as $key => $parameter){
            if($parameter === $removingParameter){
                unset($this->parameters[$key]);
            }
        }
        return $this;
    }

    public function setPermission(?string $permission) : void{
        $this->permission = $permission;
    }

    public function getPermission() : ?string{
        return $this->permission;
    }
}