<?php

namespace Tournament\Armor\Shields;

use Tournament\Armor\ArmorSlots;
use Tournament\Armor\Weapons\Axes\OneHandAxe;
use Tournament\GameMechanics\Damage;

class Buckler extends \Tournament\Armor\Armor
{
    private $dmgCount=0;
    private $blockedBlow = 0;


    public function handleRecievedDamage(Damage $dmg):Damage
    {
        $this->dmgCount++;
        if ($this->dmgCount % 2 == 0){
            $this->blockedBlow++;
            if (get_class($dmg->getSource()->getArmorSlot(ArmorSlots::SLOT_RIGHT_HAND))==OneHandAxe::class){
                if ($this->blockedBlow == 3){
                    $dmg->getTarget()->removeFromSlot(ArmorSlots::SLOT_LEFT_HAND);
                }
            }
            $dmg->setAmount(0);
            return $dmg;
        }


        return parent::handleRecievedDamage($dmg); // TODO: Change the autogenerated stub
    }

}