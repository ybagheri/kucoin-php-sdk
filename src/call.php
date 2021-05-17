<?php

namespace Ybagheri\KuCoin;

use KuCoin\SDK\Api;
use KuCoin\SDK\Http\ApiResponse;

class Call extends Api
{

    public function sendRequest($method, $uri, array $params = [], array $headers = [], $timeout = 30)
    {
        $response = parent::call($method, $uri, $params, $headers, $timeout);
        return new ApiResponse($response);
    }
  
}
