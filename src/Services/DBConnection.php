<?php

declare(strict_types=1);

namespace Services;

use \RuntimeException;
use \PDO;
use \PDOException;
use config\Settings;

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
