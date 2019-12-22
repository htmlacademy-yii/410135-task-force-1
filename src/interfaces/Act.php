<?php
/**
 * Created by PhpStorm.
 * User: Tatyana
 * Date: 21.12.2019
 * Time: 23:44
 */

namespace App\interfaces;

interface Act
{
    public function getName();
    public function getAvailableAct(int $workerId, int $customerId, int $currentId) :string;
}

