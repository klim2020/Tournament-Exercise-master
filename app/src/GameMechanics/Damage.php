<?php

namespace Tournament\GameMechanics;

use Tournament\GameClasses\Player;

class Damage
{
    private Player $source;

    /**
     * @return Player
     */
    public function getSource(): Player
    {
        return $this->source;
    }

    /**
     * @return Player
     */
    public function getTarget(): Player
    {
        return $this->target;
    }
    private Player $target;
    private $amount;

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }


    public function incrementDamage($amount){

        $this->amount += $amount;
        if ($this->amount<0){$this->amount = 0;}
        return $this;
    }

    public function __construct(Player $source, Player $target){
        $this->source = $source;
        $this->target = $target;
        $this->amount = 0;
    }

    public function getDamage():Damage
    {
        $damage = 0;
        foreach ($this->source->getArmorSlots() as $item){
            $damage =  $item->handleDamage($this);
        }
        $damage = $this->source->updateWithState($damage);
        return $damage;
    }


    public function recieveDamage($damage)
    {

        foreach ($this->target->getarmorSlots() as $item){
            $amount =  $item->handleRecievedDamage($this);
        }
        $this->target->reduceHP($amount->getAmount());
        if ($this->target->getHp() < 0){$this->target->setHp(0);}
    }

    public function InvokeFight()
    {
        $damage = $this->getDamage();
        $this->recieveDamage($damage);
    }

}