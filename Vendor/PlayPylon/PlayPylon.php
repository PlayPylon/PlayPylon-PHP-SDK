<?php

/**
 * Copyright 2017 PlayPylon LtD.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * PlayPylon.
 *
 */

namespace PlayPylon;

class PlayPylon
{
    /*
        GLOBAL VARAIBLES
        You can set global variables for your PlayPylon connection here, but we recommend doing it on Construct.
    */
    const GAME_ID_ENV_NAME = 'GAME_ID_FROM_PLAYPYLON';
    const GAME_SECRET_ENV_NAME = 'GAME_SECRET_FROM_PLAYPYLON';

    /*
        PRIVATE VARAIBLES
        The values below does not need to be changed for regular use.
    */
    const VERSION = '1.3.3';
    protected $connection;


    public function __construct(array $config = [])
    {
        $config = array_merge([
            'game_id' => getenv(static::APP_ID_ENV_NAME),
            'game_secret' => getenv(static::APP_SECRET_ENV_NAME),
            'enable_sandbox_mode' => false
        ], $config);

        $this->connection = new PlayPylonClient($config['game_id'], $config['game_secret']);
    }

    public function getApp()
    {
        return $this->connection;
    }

}