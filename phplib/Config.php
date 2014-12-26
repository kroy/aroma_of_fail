<?php

class Config {

    const ENV_NAME_DEV = 'dev';
    const ENV_NAME_PROD = 'prod';

    /**
     *  The ENV_NAME environment var is set in the apache2 site conf files
     */

    public static function isDevelopment() {
        $env = getenv('ENV_NAME');
        $env = mb_strtolower($env, 'UTF-8');

        return $env === self::ENV_NAME_DEV;
    }

    public static function isProduction() {
        $env = getenv('ENV_NAME');
        $env = mb_strtolower($env, 'UTF-8');

        return $env === self::ENV_NAME_PROD;
    }
}