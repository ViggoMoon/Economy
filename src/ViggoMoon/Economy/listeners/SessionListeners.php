<?php

namespace ViggoMoon\Economy\listeners;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use ViggoMoon\Economy\sessions\SessionsManager;

class SessionListeners implements Listener
{

    public function login(PlayerLoginEvent $event)
    {
        if(!SessionsManager::existsSession($event->getPlayer()->getName())) {
            SessionsManager::addSession($event->getPlayer()->getName());
        }
    }

    public function join(PlayerJoinEvent $event)
    {
        SessionsManager::getSessionBySessionName($event->getPlayer()->getName())->setMoney(100);
    }

    public function quit(PlayerQuitEvent $event)
    {
        if(SessionsManager::existsSession($event->getPlayer()->getName())){
            SessionsManager::getSessionBySessionName($event->getPlayer()->getName())->saveSession();
        }
    }

}