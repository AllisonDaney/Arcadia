<?php

namespace App\Http\Controllers;

use Brevo\Client\Configuration;
use GuzzleHttp\Client;
use Brevo\Client\Api\TransactionalEmailsApi;

abstract class Controller
{
    private function buildEmailWithTemplateId($templateId, $to, $params = [])
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('BREVO_API_KEY'));

        $apiInstance = new TransactionalEmailsApi(
            new Client(),
            $config
        );

        $apiInstance->sendTransacEmail([
            "templateId" => $templateId,
            'to' => [
                [
                    "email" => $to
                ]
            ],
            "params" => $params
        ]);
    }

    public function sendEmail($templateId, $to, $params = [])
    {
        $this->buildEmailWithTemplateId($templateId, $to, $params);
    }
}
