<?php
/**
 * Created by PhpStorm.
 * User: Tatyana
 * Date: 09.11.2019
 * Time: 15:55
 */

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

    private $workerId;
    private $customerId;
    private $completionDate;
    private $activeStatus;


    public function __construct($workerId, $customerId, $completionDate, $activeStatus)
    {
        $this->workerId = $workerId;
        $this->customerId = $customerId;
        $this->completionDate = $completionDate;
        $this->activeStatus = $activeStatus;
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

    public function getAvailableActions($role)
    {
        switch ($role) {
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

    public function getNextStatus($action)
    {
        switch ($action) {
            case self::ACTION_CREATE :
                return self::STATUS_NEW;
                break;
            case self::ACTION_CANCEL :
                return self::STATUS_CANCEL;
                break;
            case self::ACTION_RESPOND :
                return self::STATUS_IN_WORK;
                break;
            case self::ACTION_DONE :
                return self::STATUS_DONE;
                break;
            case self::ACTION_REFUSE :
                return self::STATUS_FAIL;
                break;
            default :
                return false;
        }
    }

}

