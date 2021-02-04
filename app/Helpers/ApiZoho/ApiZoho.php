<?php

namespace App\Helpers\ApiZoho\ApiZoho;

use GuzzleHttp\Client;

class ApiZoho
{

    private $client;
    public $response;
    public $content;
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
        $this->contentJsonToArray();
    }

    public function insertRecord($body)
    {
        $data['data'] = $body;
        $data['trigger'] = [
            'approval',
            'workflow',
            'blueprint'
        ];
        $this->response = $this->client->request('POST', $this->module, [
            'headers' => $this->header,
            'json' => $data
        ]);
        $this->contentJsonToArray();
    }

    public function updateRecord($data)
    {
        $this->response = $this->client->request('POST', $this->module, [
            'headers' => $this->header
        ]);
        $this->contentJsonToArray();
    }

    private function generateToken()
    {
        return 'Zoho-oauthtoken 1000.61de2bbe715b5257eef8fd0e2e6767b9.30d4a04c3c5baaaa3ec5600ec3b602b0';
    }

    private function contentJsonToArray()
    {
        $this->content = json_decode($this->response->getBody()->getContents(), true);
    }

}
