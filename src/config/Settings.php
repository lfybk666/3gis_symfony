<?php

namespace config;

class Settings
{
    public function getDBSettings(): array
    {
        return [
            'DB_USER' => '3gis',
            'DB_PASS' => '3gis',
            'DB_NAME' => '3gis',
            'DB_DRIVER' => 'mysql',
            'DB_HOST' => 'mysql',
            'DB_SCHEMA' => '3gis',
            'DB_PORT' => '3306',
        ];
    }
}

?>
