<?php

namespace Tournament\GameClasses;

use Tournament\Armor\Weapons\Axes\OneHandAxe;

class Viking extends Player
{

    public function __construct()
    {
        $this->equipWeapon(new OneHandAxe());
        $this->hp = 120;
    }

}