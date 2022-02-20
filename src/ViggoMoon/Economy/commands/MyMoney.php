<?php

namespace ViggoMoon\Economy\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use ViggoMoon\Economy\sessions\SessionsManager;

class MyMoney extends Command
{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            $sender->sendMessage(TextFormat::colorize("&aYour Money: &2").SessionsManager::getSessionBySessionName($sender->getName())->getMoney());
        }
    }

}