<?php

namespace ViggoMoon\Economy\sessions;

class SessionsManager
{

    public static array $sessions = [];

    public static function addSession(string $sessionName)
    {
        self::$sessions[$sessionName] = new Session($sessionName);
    }

    public static function existsSession(string $sessionName): bool
    {
        if(isset(self::$sessions[$sessionName])){
            return true;
        }
        return false;
    }

    public static function getSessionBySessionName(string $sessionName): Session
    {
        return self::$sessions[$sessionName];
    }

    public static function getSessions(): array
    {
        return self::$sessions;
    }

}