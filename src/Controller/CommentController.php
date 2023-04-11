<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Rubric;
use App\Services\DBConnection;
//use App\Application\Response;
use http\Client\Response;
use PDO;

class CommentController
{

    public function __construct()
    {

    }

    public function getRubricList()
    {
        $connection = DBConnection::getInstance();
        $rubrics = $connection->query('select * from rubric');
        $rubrics->setFetchMode(PDO::FETCH_CLASS, Rubric::class);

        return $rubrics->fetchAll();
    }

}
