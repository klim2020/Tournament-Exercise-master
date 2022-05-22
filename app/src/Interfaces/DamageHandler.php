<?php

namespace Tournament\Interfaces;

use Tournament\GameClasses\Player;
use Tournament\GameMechanics\Damage;

/**
 * Интерфейс взаимодействия предметов и урона
 * все, кто реализует этот интерфейс преобритают возможность участвовать в формировании/получении  урона
 */
interface DamageHandler
{
    /**
     * Генерация урона
     * @param $dmg - входящий урон
     * @return mixed - выходящий после модификации
     */
    public function handleDamage(Damage $dmg):Damage;

    /**
     * @param Damage $dmg
     * @return Damage
     */
    public function handleRecievedDamage(Damage $dmg):Damage;
}