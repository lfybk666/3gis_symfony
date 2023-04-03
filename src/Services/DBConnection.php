<?php

declare(strict_types=1);

namespace App\Services;

use \RuntimeException;
use \PDO;
use \PDOException;
use App\config\Settings;

class DBConnection extends PDO
{
    private static $instance;

    private function __construct()
    {
        $settings = new Settings();
        $dbSettings = $settings->getDBSettings();

        try {
            parent::__construct(
                $dbSettings['DB_DRIVER'] . ':host=' . $dbSettings['DB_HOST'] . ';dbname=' . $dbSettings['DB_NAME'],
                $dbSettings['DB_USER'],
                $dbSettings['DB_PASS'],
            );
        } catch (PDOException $e) {
            // TODO мне кажется что это тоже не работает
            throw new RuntimeException('Ошибка подключения к базе данных' . $e->getMessage());
        }

    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}
