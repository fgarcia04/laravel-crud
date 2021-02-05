<?php

namespace App\Helpers\ApiZoho\ApiZoho;

use App\Exceptions\CustomException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

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
/*        $this->client = new Client([
            'base_uri' => 'https://www.zohoapiaas.com/crm/v2/'
        ]);*/
    }

    public function insertRecord($body)
    {
        try{
            $data['data'] = $body;
            $data['trigger'] = [
                'approval',
                'workflow',
                'blueprint'
            ];
           /* $this->response = $this->client->request('POST', $this->module, [
                'headers' => $this->header,
                'json' => $data
            ]);
            $this->contentJsonToArray();*/
        }catch (ConnectException $e){
            throw new CustomException($e->getMessage());
        }
    }

    public function updateRecord($data)
    {
        try{
         /*   $this->response = $this->client->request('POST', $this->module, [
                'headers' => $this->header
            ]);
            $this->contentJsonToArray();*/
        }catch (ConnectException $e){
            throw new CustomException($e->getMessage());
        }
    }

    private function generateToken()
    {
        return 'Zoho-oauthtoken 1000.3e188c3247f0b5be765bd99ba2e12ab2.76e102a344eb65c61ee43fdb4295474e';
    }

    private function contentJsonToArray()
    {
        $this->content = json_decode($this->response->getBody()->getContents(), true);
    }

}
