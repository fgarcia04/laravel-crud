<?php

namespace App\Helpers\SendMessage\WhatsApp;

use GuzzleHttp\Client;

class SendMessage
{

    private $client;
    public $response;

    function __construct($channel, $phone, $body)
    {
        //https:/api.sibila.net/
        $this->crmUser = 'SIBILA_CRM';
        $this->channel = $channel;
        $this->phone = $phone;
        $this->body = $body;
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https:/api.sibila.net/',
            // You can set any number of default request options.
            //'timeout'  => 2.0,
        ]);
    }

    public function sendMessage(){
        $this->response =  $this->client->request('GET', 'enviar.php?crmuser='.$this->crmUser.'&channel='.$this->channel.'&phone='.$this->phone.'&body='.$this->body);
        $this->validateResponse();
    }

    private function validateResponse(){
        return $this->response = 'algo';
    }

}
