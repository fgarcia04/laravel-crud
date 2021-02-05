<?php

namespace App\Helpers\SendMessage\SendMessage;

use App\Exceptions\CustomException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

class SendMessage
{

    private $client;
    public $response;

    function __construct($channel, $phone, $body)
    {
        $this->crmUser = 'SIBILA_CRM';
        $this->channel = $channel;
        $this->phone = $phone;
        $this->body = $body;
        /*$this->client = new Client([
            'base_uri' => 'https:/api.sibila.net/'
        ]);*/
    }

    public function sendMessage()
    {
        try {
            //$this->response = $this->client->request('GET', 'enviar.php?crmuser=' . $this->crmUser . '&channel=' . $this->channel . '&phone=' . $this->phone . '&body=' . $this->body);
        }catch (ConnectException $e){
            throw new CustomException($e->getMessage(),);
        }
    }

}
