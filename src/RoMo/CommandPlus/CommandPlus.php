<?php

declare(strict_types=1);

namespace RoMo\CommandPlus;

use pocketmine\event\EventPriority;
use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;
use pocketmine\plugin\Plugin;
use pocketmine\Server;
use RoMo\CommandPlus\command\BaseCommand;
use RoMo\CommandPlus\overload\Overload;

class CommandPlus implements Listener{

    /** @var bool */
    private static ?Plugin $plugin = null;

    public static function isRegistered() : bool{
        return self::$plugin !== null;
    }

    public static function register(Plugin $plugin) : void{
        if(self::isRegistered()){
            return;
        }
        self::$plugin = $plugin;
        Server::getInstance()->getPluginManager()->registerEvent(DataPacketSendEvent::class, function(DataPacketSendEvent $event) : void{
            foreach($event->getPackets() as $packet){
                if($packet instanceof AvailableCommandsPacket){
                    foreach($packet->commandData as $name => $data){
                        if(($command = Server::getInstance()->getCommandMap()->getCommand($name)) instanceof BaseCommand){
                            if($command->hasOverloads()){
                                $data->overloads = array_map(function(Overload $overload) : array{
                                    return $overload->getParameters();
                                }, $command->getOverloads());
                            }
                        }
                    }
                }
            }
        }, EventPriority::MONITOR, self::$plugin);
    }
}