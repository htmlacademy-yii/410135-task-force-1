<?php
/**
 * Created by PhpStorm.
 * User: Tatyana
 * Date: 09.11.2019
 * Time: 15:55
 */

namespace App\component;

use App\component\act\ActCreate;
use App\component\act\ActInWork;
use App\component\act\ActBase;

class AvailableActions
{

     const ALL_ACTIONS_AND_STATUSES = [
        "actions" => [
            ActBase::ACTION_CREATE,
            ActBase::ACTION_CANCEL,
            ActBase::ACTION_RESPOND,
            ActBase::ACTION_DONE,
            ActBase::ACTION_REFUSE
        ],
        "statuses" => [
            ActBase::STATUS_NEW,
            ActBase::STATUS_IN_WORK,
            ActBase::STATUS_DONE,
            ActBase::STATUS_CANCEL,
            ActBase::STATUS_FAIL
        ]
    ];
     const ACTION_TO_STATUSE = [
        ActBase::ACTION_CREATE => ActBase::STATUS_NEW,
        ActBase::ACTION_CANCEL => ActBase::STATUS_CANCEL,
        ActBase::ACTION_RESPOND => ActBase::STATUS_IN_WORK,
        ActBase::ACTION_DONE => ActBase::STATUS_DONE,
        ActBase::ACTION_REFUSE => ActBase::STATUS_FAIL
    ];


    public $workerId;
    public $customerId;
    public $completionDate;
    public $activeStatus;
    public $role;
    public $currentId;
    public $availableAction;

    public function __construct($workerId, $customerId, $completionDate, $activeStatus, $currentId)
    {
        $this->workerId = $workerId;
        $this->customerId = $customerId;
        $this->completionDate = $completionDate;
        $this->activeStatus = $activeStatus;
        $this->currentId = $currentId;
    }

    public function getAvailableAction()
    {

        switch ($this->activeStatus) {
            case ActBase::STATUS_NEW :
                $act = new ActCreate();
                break;

            case ActBase::STATUS_IN_WORK :
                $act = new ActInWork();
                break;
        }
        if(!empty($act)){
            return $act->getAvailableAct($this->workerId,$this->customerId,$this->currentId);
        } else {
            return "Нет доступных статусов";
        }

    }

    public function getNextStatus(string $action) : string
    {
       if(isset(self::ACTION_TO_STATUSE[$action])){
           return self::ACTION_TO_STATUSE[$action];
       }
    }

}

