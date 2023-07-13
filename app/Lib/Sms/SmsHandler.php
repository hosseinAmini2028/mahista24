<?php

namespace App\Lib\Sms;

use Cryptommer\Smsir\Smsir;

class SmsHandler
{
    private $_admin_phones = [];
    private $_smsir;
    public function __construct()
    {
        $this->_smsir = Smsir::send();
        $this->_admin_phones = config('app.admin_phones');
    }

    public function send($phoneNumber, $parameters, $templateId)
    {
        try {

            $allParams = array_map(function ($item) {
                $parameter = new \Cryptommer\Smsir\Objects\Parameters($item['name'], $item['value']);
                return $parameter;
            }, $parameters);
            $request = $this->_smsir->Verify($phoneNumber, $templateId, $allParams);
            return $request;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function sendAdmin($parameters, $templateId)
    {
        try {
            $allParams = array_map(function ($item) {
                $parameter = new \Cryptommer\Smsir\Objects\Parameters($item['name'], $item['value']);
                return $parameter;
            }, $parameters);
            foreach ($this->_admin_phones as $key => $value) {
                $res[] = $this->_smsir->Verify($value, $templateId, $allParams);
            }
            return $res;
            //code...
        } catch (\Throwable $th) {
            return $th;
        }
    }

}
