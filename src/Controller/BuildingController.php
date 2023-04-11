<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Rubric;
use App\Services\DBConnection;
//use App\Application\Response;
use http\Client\Response;
use PDO;

class BuildingController
{

    public function __construct()
    {

    }

    public function getBuildingList()
    {
        $connection = DBConnection::getInstance();
        $rubrics = $connection->query('select * from building');
        $rubrics->setFetchMode(PDO::FETCH_CLASS, Rubric::class);

        return $rubrics->fetchAll();
    }

}
