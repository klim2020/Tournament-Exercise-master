<?php

namespace Tournament\GameClasses;



use Tournament\Armor\Armor;
use Tournament\Armor\ArmorSlots;
use Tournament\Armor\Chest\PoorManChest;
use Tournament\Armor\Shields\Buckler;
use Tournament\Armor\Weapons\Weapon;
use Tournament\GameMechanics\Damage;

class Player
{
    protected $hp;

    /**
     * @return mixed
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param mixed $hp
     */
    public function setHp($hp): void
    {
        $this->hp = $hp;
    }


    protected $armorSlots =  array();

    /**
     * @return array
     */
    public function getArmorSlots(): array
    {
        return $this->armorSlots;
    }

    public function getArmorSlot($slot)
    {
        if (isset($this->armorSlots[$slot])){
         return $this->armorSlots[$slot];
        }
        return new class(){};
    }


    //protected Weapon $weapon;

    public function equip(string $name)
    {
        if ($name =="buckler"){
            $this->armorSlots[ArmorSlots::SLOT_LEFT_HAND] = new Buckler();
        }
        if ($name =="armor"){
            $this->armorSlots[ArmorSlots::SLOT_CHEST] = new PoorManChest();
        }
        return $this;
    }

    function equipWeapon(Armor $weapon, $twohanded = false){
        if ($twohanded){
            $this->armorSlots[ArmorSlots::SLOT_LEFT_HAND + ArmorSlots::SLOT_RIGHT_HAND] = $weapon;
        }else {
            $this->armorSlots[ArmorSlots::SLOT_RIGHT_HAND] = $weapon;
        }

    }


    function engage(Player $enemy){

        while ($this->hitpoints()>0  && $enemy->hitpoints() > 0){
            $this->attack($enemy);
            $enemy->attack($this);
        }

    }

    private function attack(Player $enemy)
    {
        $damage = new Damage($this,$enemy);
        $damage->InvokeFight();

    }





    public function isAlive(){
        return ($this->hp > 0);
    }

    public function hitpoints(){
        return $this->hp;
    }

    public function reduceHP($damage)
    {
        $this->hp -= $damage;
    }

    public function removeFromSlot(int $slot)
    {
        unset($this->armorSlots[$slot]);
    }

    public function updateWithState(Damage $damage)
    {
        return $damage;
    }


}