<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Rubric;
use App\Services\DBConnection;
//use App\Application\Response;
use http\Client\Response;
use PDO;

class RubricController
{

    public function __construct()
    {

    }

    public function getRubricList(): Response
    {
        $connection = DBConnection::getInstance();
        $rubrics = $connection->query('select * from rubric');
        $rubrics->setFetchMode(PDO::FETCH_CLASS, Rubric::class);

        return new Response($rubrics);
    }

}


$connection = DBConnection::getInstance();
$rubrics = $connection->query('select * from rubric');
$rubrics->setFetchMode(PDO::FETCH_CLASS, Rubric::class);
foreach ($rubrics as $rubric) {
    print_r($rubric);
}
