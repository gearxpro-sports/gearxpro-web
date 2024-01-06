<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class OmniSendApiService
{

    private $basePath;
    public function __construct()
    {
        if (env('OMNISEND_API_KEY')) {
            $this->basePath = 'http://pro.ip-api.com/json/';
        } else {
            $this->basePath = 'http://ip-api.com/json/';
        }
    }

    /**
     * @return string
     */
    public function getCart($cartId): string
    {
        /*TODO IMPLEMENTARE GET*/
        return $this->basePath;
    }

    public function insertCart(): string
    {
        /*TODO IMPLEMENTARE INSERT*/
        return $this->basePath;
    }

    public function updateCart(): string
    {
        /*TODO IMPLEMENTARE UPDATE*/
        return $this->basePath;
    }

    public function deleteCart(): string
    {
        /*TODO IMPLEMENTARE DELETE*/
        return $this->basePath;
    }
}
