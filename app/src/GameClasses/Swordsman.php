<?php

namespace Tournament\GameClasses;

use Tournament\Armor\Weapons\Swords\OneHandSword;
use Tournament\GameMechanics\Damage;

class Swordsman  extends Player
{

    private $vicious = false;
    private $blowCount;

    public function __construct($state = "none")
    {
        $this->vicious = ($state == "Vicious");
        $this->blowCount = 0;
        $this->state = $state;
        $this->equipWeapon(new OneHandSword());
        $this->hp = 100;
    }

    public function updateWithState(Damage $damage)
    {
        $this->blowCount++;
        if ($this->vicious){
            if ($this->blowCount <= 2 ){
               $damage->incrementDamage(20);
            }
        }
        return parent::updateWithState($damage);
    }


}