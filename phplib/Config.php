<?php

class Config {

    const ENV_NAME_DEV = 'dev';
    const ENV_NAME_PROD = 'prod';

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