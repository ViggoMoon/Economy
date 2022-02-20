<?php

namespace ViggoMoon\Economy\sessions;

use pocketmine\utils\Config;
use ViggoMoon\Economy\Main;

class Session
{

    public Config $config;
    public string $sessionName;

    public function __construct(string $sessionName)
    {
        $this->sessionName = $sessionName;
        $this->config = new Config(Main::getPlugin()->getDataFolder()."sessions".DIRECTORY_SEPARATOR.$sessionName.".json", Config::JSON);
    }

    public function setMoney(int $value)
    {
        $this->config->set("money", $value);
        $this->config->save();
    }

    public function getMoney(): int
    {
        return $this->config->get("money");
    }

    public function saveSession()
    {
        $this->config->save();
    }

}