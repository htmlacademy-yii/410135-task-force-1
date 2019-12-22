<?php
/**
 * Created by PhpStorm.
 * User: Tatyana
 * Date: 22.12.2019
 * Time: 15:09
 */

namespace App\component\act;

class ActInWork extends ActBase
{

    public function getName()
    {
        return self::STATUS_IN_WORK;
    }

    public function getAvailableAct(int $workerId, int $customerId, int $currentId) :string
    {
        // если заказчик
        if($currentId === $customerId){
            return self::ACTION_DONE;
        } elseif ($currentId === $workerId){
            // если исполнитель
            return self::ACTION_REFUSE;
        } else {
            return "";
        }
    }
}