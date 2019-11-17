<?php
/**
 * Created by PhpStorm.
 * User: Tatyana
 * Date: 09.11.2019
 * Time: 15:55
 */

namespace App\component;

class AvailableActions
{
    private const STATUS_NEW = "Новое";
    private const STATUS_IN_WORK = "В работе";
    private const STATUS_DONE = "Выполнено";
    private const STATUS_CANCEL = "Отменено";
    private const STATUS_FAIL = "Провалено";
    private const ACTION_CREATE = "Создать";
    private const ACTION_CANCEL = "Отменить";
    private const ACTION_RESPOND = "Откликнуться";
    private const ACTION_DONE = "Выполнено";
    private const ACTION_REFUSE = "Отказаться";
    private const CUSTOMER = "Заказчик";
    private const WORKER = "Исполнитель";
    public const ALL_ACTIONS_AND_STATUSES = [
        "actions" => [
            self::ACTION_CREATE,
            self::ACTION_CANCEL,
            self::ACTION_RESPOND,
            self::ACTION_DONE,
            self::ACTION_REFUSE
        ],
        "statuses" => [
            self::STATUS_NEW,
            self::STATUS_IN_WORK,
            self::STATUS_DONE,
            self::STATUS_CANCEL,
            self::STATUS_FAIL
        ]
    ];
    private const ACTION_TO_STATUSE = [
        self::ACTION_CREATE => self::STATUS_NEW,
        self::ACTION_CANCEL => self::STATUS_CANCEL,
        self::ACTION_RESPOND => self::STATUS_IN_WORK,
        self::ACTION_DONE => self::STATUS_DONE,
        self::ACTION_REFUSE => self::STATUS_FAIL
    ];


    private $workerId;
    private $customerId;
    private $completionDate;
    private $activeStatus;
    private $role;

    public function __construct($workerId, $customerId, $completionDate, $activeStatus,$role)
    {
        $this->workerId = $workerId;
        $this->customerId = $customerId;
        $this->completionDate = $completionDate;
        $this->activeStatus = $activeStatus;
        $this->role = $role;
    }

    private function getAvailableActionsForCustomer()
    {
        switch ($this->activeStatus) {
            case self::STATUS_NEW :
                return self::ACTION_RESPOND;
                break;
            case self::STATUS_IN_WORK :
                return self::ACTION_REFUSE;
                break;
            default :
                return false;
        }
    }


    private function getAvailableActionsForWorker()
    {
        switch ($this->activeStatus) {
            case self::STATUS_NEW :
                return self::ACTION_CANCEL;
                break;
            case self::STATUS_IN_WORK :
                return self::ACTION_DONE;
                break;
            default :
                return false;
        }
    }

    public function getAvailableActions()
    {
        switch ($this->role ) {
            case self::CUSTOMER :
                $this->getAvailableActionsForCustomer();
                break;
            case self::WORKER :
                $this->getAvailableActionsForWorker();
                break;
            default:
                return false;
        }
    }

    public function getNextStatus(string $action) : string
    {
       if(isset(self::ACTION_TO_STATUSE[$action])){
           return self::ACTION_TO_STATUSE[$action];
       }
    }

}

