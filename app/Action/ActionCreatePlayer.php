<?php

namespace App\Action\Player;

use App\Models\Player;
use Illuminate\Support\Facades\Hash;

class ActionCreatePlayer
{
    private static string $name;
    private static string $email;
    private static string $nickname;
    private static string $password;

    public static function prepare(string $name, string $email,
     string $nickname, string $password)
    {
        self::$name  = $name;
        self::$email = $email;
        self::$nickname = $nickname;
        self::$password = $password;
    }

    public static function execute() : Player
    {
        $player = new Player();

        $player->setName(self::$name);
        $player->nickname   = self::$nickname;
        $player->email      = self::$email;
        $player->password   = Hash::make(self::$password);

        $player->save();

        return $player;
    }
}
