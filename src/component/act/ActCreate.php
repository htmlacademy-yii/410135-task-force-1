<?php
/**
 * Created by PhpStorm.
 * User: Tatyana
 * Date: 21.12.2019
 * Time: 23:58
 */

namespace App\component\act;

class ActCreate extends ActBase
{

    public function getName()
    {
        return self::STATUS_NEW;
    }


    public function getAvailableAct(int $workerId, int $customerId, int $currentId) :string
    {
        // если заказчик
        if($currentId === $customerId){
            return self::ACTION_CANCEL;
        } elseif ($currentId === $workerId){
            // если исполнитель
            return self::ACTION_RESPOND;
        } else {
            return "";
        }
    }
}