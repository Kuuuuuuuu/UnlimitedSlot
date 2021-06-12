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
    	$this->server->getLogger()->debug("JoinAddSlot Enable");
        $this->saveResource( "slot.yml" );
        $this->config = new Config( $this->getDataFolder() . "slot.yml", Config::YAML );
        $this->getServer()->getPluginManager()->registerEvents( $this, $this );
    }

    public function onDisable () {
    	$this->server->getLogger()->debug("JoinAddSlot Disable");
        $this->config->save();
    }

    public function RegenSlot ( QueryRegenerateEvent $ev ) {
        $ev->setMaxPlayerCount( $ev->getPlayerCount() + $this->config->get( "JoinAddSlot" ) );
    }
}
