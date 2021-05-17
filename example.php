<?php
require_once __DIR__.'/vendor'.DIRECTORY_SEPARATOR.'autoload.php';
require __DIR__.'/src/call.php';

use KuCoin\SDK\Http\Request;
use KuCoin\SDK\KuCoinApi;
use KuCoin\SDK\Auth;
use Ybagheri\KuCoin\Call;



//loading data from .env
$Loader = new \josegonzalez\Dotenv\Loader(realpath(__DIR__ . '/.env'));
$Loader->parse();
$environment = $Loader->toArray();
$key=$environment["API_KEY"];
$secret=$environment["API_SECRET"];
$passphrase=$environment["API_PASSPHRASE"];

//if in testing kucoin server else, comment next line.
KuCoinApi::setBaseUri('https://openapi-sandbox.kucoin.com');

$auth = new Auth($key, $secret, $passphrase, Auth::API_KEY_VERSION_V2);
$api=new Call($auth);
$body =[];//['type' => 'main'];
$endPoint='/api/v1/accounts';
try {
    $result = $api->sendRequest(Request::METHOD_GET, $endPoint, $body);
    var_dump($result);
} catch (HttpException $e) {
    var_dump($e->getMessage());
} catch (BusinessException $e) {
    var_dump($e->getMessage());
}

