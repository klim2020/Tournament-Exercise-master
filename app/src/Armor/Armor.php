<?php

namespace Tournament\Armor;



use Tournament\GameMechanics\Damage;
use Tournament\Interfaces\DamageHandler;

class Armor implements DamageHandler
{
    private $slot;

    public function handleDamage(Damage $dmg):Damage
    {
        return $dmg;
    }

    public function handleRecievedDamage(Damage $dmg):Damage
    {
        return $dmg;
    }

}