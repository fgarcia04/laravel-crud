<?php

namespace App\Helpers\ApiZoho\ApiZoho;

use GuzzleHttp\Client;

class ApiZoho
{

    private $client;
    public $response;
    private $token;
    private $module;
    private $header;

    function __construct($module)
    {
        $this->token = $this->generateToken();
        $this->module = $module;
        $this->header = [
            'Authorization' => $this->token
        ];
        $this->client = new Client([
            'base_uri' => 'https://www.zohoapis.com/crm/v2/'
        ]);
    }

    public function getRecords()
    {
        $this->response = $this->client->request('GET', $this->module, [
            'headers' => $this->header
        ]);
    }

    public function insertRecord($data)
    {
        $this->response = $this->client->request('POST', $this->module, [
            'headers' => $this->header
        ]);
    }

    public function updateRecord($data)
    {
        $this->response = $this->client->request('POST', $this->module, [
            'headers' => $this->header
        ]);
    }

    private function generateToken(){
        return 'Zoho-oauthtoken 1000.9e823896938bfc5f04bcd4c66706b138.2258c3ba45afd0ca9563d21bde87ffe2';
    }

}
