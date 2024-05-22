<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brevo\Client\Configuration;
use GuzzleHttp\Client;
use Brevo\Client\Api\TransactionalEmailsApi;

class EmailController extends Controller
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

    public function send(Request $request, Int $templateId)
    {
        $to = $request->input('to');
        $params = $request->input('params');

        $this->buildEmailWithTemplateId($templateId, $to, $params);
    }
}
