<?php
/**
 * Created by PhpStorm.
 * User: Tatyana
 * Date: 21.12.2019
 * Time: 23:52
 */

namespace App\component\act;

use App\interfaces\Act;

abstract class ActBase implements Act
{
    public const STATUS_NEW = "Новое";
    public const STATUS_IN_WORK = "В работе";
    public const STATUS_DONE = "Выполнено";
    public const STATUS_CANCEL = "Отменено";
    public const STATUS_FAIL = "Провалено";
    public const ACTION_CREATE = "Создать";
    public const ACTION_CANCEL = "Отменить";
    public const ACTION_RESPOND = "Откликнуться";
    public const ACTION_DONE = "Выполнено";
    public const ACTION_REFUSE = "Отказаться";
    public const CUSTOMER = "Заказчик";
    public const WORKER = "Исполнитель";

    abstract public function getName();

    abstract public function getAvailableAct(int $workerId, int $customerId, int $currentId) :string;
}