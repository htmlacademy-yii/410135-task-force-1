<?php
/**
 * Created by PhpStorm.
 * User: Tatyana
 * Date: 04.01.2020
 * Time: 0:14
 */

namespace App\sqlData;

use App\exc\DataException;

class ConvertCsvToSql
{
    protected $fileName, $tableName;
    protected $filePath = "../../data/";

    function __construct($fileName, $tableName)
    {
        try {
            if (is_file(realpath("./data/" . $fileName))) {
                $this->fileName = realpath("./data/" . $fileName);
            } else {
                throw new DataException(' Файла по заданному пути нет');
            }
        } catch (DataException $e) {
            echo $e->getMessage();
        }
        $this->tableName = $tableName;
    }

    protected function readFile(): ?\SplFileObject
    {
        $file = null;
        if ($this->fileName) {
            $file = new \SplFileObject($this->fileName);
            if (!$file) {
                throw new DataException('Ошибка при открытии файла' . $this->fileName);
            }
        }
        return $file;
    }

    protected function getData($file): string
    {
        $i = $count = 0;
        $sql = '';
        $dataInsert = [];
        $file->setFlags(\SplFileObject::READ_CSV);
        foreach ($file as $row) {
            if ($i == 0) {
                $dataHead = " (" . implode(", ", $row) . ")";
                $count = count($row);

            } elseif (count($row) === $count) {

                $dataInsert[] = "( '" . implode("', '", $row) . "')";
            }
            $i++;
        }
        if (empty($dataHead) || empty($dataInsert)) {
            throw new DataException('Недостаточно данных для записи в файле ' . $this->fileName);
        } else {
            $sql = "INSERT INTO " . $this->tableName . $dataHead . " VALUES " . implode(", ", $dataInsert). "; ";
        }
        return $sql;
    }

    public function getSql(): string
    {
        $sql = '';
        try {
            $file = $this->readFile();
            if ($file) {
                $sql = $this->getData($file);
            }

        } catch (DataException $e) {
            echo $e->getMessage();
        }
        return $sql;
    }
}



