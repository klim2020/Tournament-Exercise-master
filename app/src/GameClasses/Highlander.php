<?php

namespace Tournament\GameClasses;

use Tournament\Armor\Weapons\Swords\TwoHandSword;
use Tournament\GameMechanics\Damage;

class Highlander extends Player
{
    private $berserk = false;
    private $totalHP = 150;

    public function __construct($state = "none")
    {
        $this->berserk = ($state == "Veteran");
        $this->equipWeapon(new TwoHandSword(), true);
        $this->hp = $this->totalHP;
    }


    public function updateWithState(Damage $damage)
    {
        if ($this->berserk) {
            if (($this->totalHP * 0.3) >= $this->hp) {
                $damage->setAmount($damage->getAmount() * 2);
            }
        }
        return parent::updateWithState($damage);
    }

}