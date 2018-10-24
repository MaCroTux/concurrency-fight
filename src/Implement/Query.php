<?php

declare(strict_types=1);

namespace Implement;

class Query
{
    public function execute(): int
    {
        $mysql = [
            'dbname' => 'classicmodels',
            'user' => 'root',
            'password' => 'root',
            'host' => 'db',
            'driver' => 'pdo_mysql',
        ];

        $db = new \PDO(
            'mysql:host='.$mysql['host'].';dbname='.$mysql['dbname'],
            $mysql['user'],
            $mysql['password'],
            array( \PDO::ATTR_PERSISTENT => false)
        );

        $query = $db->prepare("SELECT postalCode FROM customers");
        $query->execute();
        $result = $query->fetchAll();

        $dataMap = [];

        foreach ($result as $item) {
            $dataMap[] = (int)preg_replace("/[A-Z-]/", "", $item['postalCode']);
        }

        $dataMapInteger = [];

        foreach ($dataMap as $data) {
            if (!is_string($data) && !empty($data)) {
                $dataMapInteger[] = $data;
            }
        }

        $sumPairNumber = 0;

        foreach ($dataMapInteger as $data) {
            if (is_numeric($data) && $data > 1000) {
                $sumPairNumber += $data;
            }
        }

        return $sumPairNumber;
    }
}
