<?php

namespace ViggoMoon\Economy;

use pocketmine\plugin\PluginBase;
use ViggoMoon\Economy\commands\MyMoney;
use ViggoMoon\Economy\commands\SetMoney;
use ViggoMoon\Economy\listeners\SessionListeners;

class Main extends PluginBase
{

    private static Main $plugin;

    protected function onEnable(): void
    {
        self::$plugin = $this;
        $this->getServer()->getCommandMap()->registerAll("Economy", [new MyMoney("mymoney"), new SetMoney("setmoney")]);
        $this->getServer()->getPluginManager()->registerEvents(new SessionListeners(), $this);
        $this->getLogger()->info("Plugin Enabled");
    }

    protected function onDisable(): void
    {
        $this->getLogger()->info("Plugin Disabled");
    }

    public static function getPlugin(): Main
    {
        return self::$plugin;
    }

}