<?php

namespace PixellWeb\Zoho\app\Ressources;


use PixellWeb\Zoho\app\Api;

class Ressource
{
    /**
     * @var Api
     */
    public $api;


    /**
     * Ressource constructor.
     */
    public function __construct()
    {
        $this->api = new Api();
    }

}
