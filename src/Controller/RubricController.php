<?php

declare(strict_types=1);

use Services\DBConnection;

class RubricController
{

    public function __construct()
    {

    }

    private function getRubricList()
    {

    }

}
$connection = DBConnection::getInstance();
$rubrics = $connection->query('select * from rubric');
$rubrics->setFetchMode(PDO::FETCH_INTO, new Rubric());
foreach ($rubrics as $rubric){
    print_r($rubric);
}
