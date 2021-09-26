<?php


namespace App\Service;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class QrcodePay
{
    private $token;
    private $httpClient, $domainUrl;

    public function __construct()
    {
        $domainURL = config('qrcode_pay.qrcode_domain');
        $this->domainUrl = $domainURL;
        $token = Cache::get('token');
        if ($token) {
            $this->token = $token;
        } else {
            $clientId = config('qrcode_pay.client_id');
            $clientSecret = config('qrcode_pay.client_secret');
            $response = Http::asForm()->post("$domainURL/oauth/token", [
                'grant_type' => 'client_credentials',
                'client_id' => $clientId,
                'client_secret' => $clientSecret
            ]);
            $token = $response->json()['access_token'];
            Cache::put('token',$token);
            $this->token = $token;
        }
        $this->httpClient = Http::withToken($this->token)->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]);
    }

    public function getListQrcodes()
    {
        return $this->httpClient->get("$this->domainUrl/api/qrcodes")->json();
    }

    public function getQrcodeById($id)
    {
        return $this->httpClient->get("$this->domainUrl/api/qrcodes/$id")->json();
    }

}
