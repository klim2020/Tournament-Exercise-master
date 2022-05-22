<?php

namespace Tournament\Armor\Weapons;

use Tournament\Armor\Armor;
use Tournament\GameMechanics\Damage;
use Tournament\Interfaces\DamageHandler;

class Weapon extends Armor
{
    protected $damage;

    public function setDamage($amount){
        $this->damage = $amount;
    }

    public function handleDamage(Damage $dmg):Damage
    {
        return parent::handleDamage($dmg->incrementDamage($this->damage));
    }


}