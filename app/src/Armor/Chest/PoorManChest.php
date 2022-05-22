<?php

namespace Tournament\Armor\Chest;

use Tournament\Armor\ArmorSlots;
use Tournament\GameMechanics\Damage;

class PoorManChest extends \Tournament\Armor\Armor
{
    private $reducedDamage;
    private $reduceInvokedDamage;
    public function __construct()
    {
        $this->reduceInvokedDamage = 1;
        $this->reducedDamage = 3;
        $this->slot = ArmorSlots::SLOT_CHEST;
    }
    public function handleRecievedDamage(Damage $dmg):Damage
    {
        $dmg->incrementDamage(-$this->reducedDamage);
        return parent::handleRecievedDamage($dmg);
    }

    public function handleDamage(Damage $dmg):Damage
    {
        $dmg->incrementDamage(-$this->reduceInvokedDamage);
        return parent::handleDamage($dmg);
    }
}