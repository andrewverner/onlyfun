<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 23:33
 */
class EveXMLApi
{

    public $host = 'https://api.eveonline.com';
    public $url;
    public $params;

    public function send()
    {
        $ch = curl_init("{$this->host}{$this->url}?{$this->params}");
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($ch);

        if (curl_errno($ch)) return false;
        $xml = simplexml_load_string($result);
        if (!$xml) return false;
        if (isset($xml->error)) return false;
        return $xml->result;
    }

}