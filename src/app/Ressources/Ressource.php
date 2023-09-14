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


    protected function getRecords(string $ressource_path): array
    {
        // Pagination
        $responses = [];
        $page = 1;
        do {
            $response = $this->api->get($ressource_path.'&page='.$page);
            if (isset($response['data'])) {
                $responses = array_merge($responses, $response['data']);
            }

            $page ++;
        } while (!empty($response['info']['more_records']));

        return $responses;
    }

}
