<?php

namespace App\Helpers\ApiZoho\ApiZoho;

use GuzzleHttp\Client;

class ApiZoho
{

    private $client;
    public $response;

    function __construct($channel, $phone, $body)
    {
        $this->client = new Client([
            'base_uri' => 'https://www.zoho.com/crm/developer/docs/api/v2/'
        ]);
    }

    public function getRecords()
    {
        $this->response = $this->client->request('GET', 'enviar.php?crmuser=' . $this->crmUser . '&channel=' . $this->channel . '&phone=' . $this->phone . '&body=' . $this->body);
        $this->validateResponse();
    }

    public function insertRecord()
    {
        $this->response = $this->client->request('GET', 'enviar.php?crmuser=' . $this->crmUser . '&channel=' . $this->channel . '&phone=' . $this->phone . '&body=' . $this->body);
        $this->validateResponse();
    }

    public function updateRecord()
    {
        $this->response = $this->client->request('GET', 'enviar.php?crmuser=' . $this->crmUser . '&channel=' . $this->channel . '&phone=' . $this->phone . '&body=' . $this->body);
        $this->validateResponse();
    }

    private function validateResponse()
    {
        return $this->response = 'algo';
    }

}
