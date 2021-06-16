<?php

namespace MelidaZ;

use pocketmine\event\Listener;
use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Server;

class Main extends PluginBase implements Listener
{
	
    private $config;
    public function onEnable () {
    	$this->server->getLogger()->debug("UnlimitedSlot Enable");
        $this->getServer()->getPluginManager()->registerEvents( $this, $this );
    }

    public function onDisable () {
    	$this->server->getLogger()->debug("UnlimitedSlot Disable");
    }

    public function RegenSlot (QueryRegenerateEvent $ev ) {
        $ev->setMaxPlayerCount($ev->getPlayerCount() + 1);
    }
}
