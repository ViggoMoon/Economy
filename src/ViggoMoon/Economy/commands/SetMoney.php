<?php

namespace ViggoMoon\Economy\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\utils\TextFormat;
use ViggoMoon\Economy\Main;
use ViggoMoon\Economy\sessions\SessionsManager;

class SetMoney extends Command
{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(isset($args[0]) and isset($args[1]) and isset($args[3])){
            if(SessionsManager::existsSession($args[1])){
                SessionsManager::getSessionBySessionName($args[1])->setMoney($args[2]);
                $sender->sendMessage(TextFormat::colorize("&cMoney Set Good"));
            }else{
                $sender->sendMessage(TextFormat::colorize("Player Not Exists In Config"));
            }
        }else{
            $sender->sendMessage(TextFormat::colorize("&cUse: /setmoney (playerName) (amount)"));
        }
    }

}