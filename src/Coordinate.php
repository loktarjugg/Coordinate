<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/18
 * Time: 下午7:05
 */

namespace Loktarjugg\Coordinate;

use GuzzleHttp\Client;
use Config;
use Exception;

class Coordinate
{
    /**
     * @var Client
     */
    protected $http;

    /**
     * @var mixed
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $url = 'http://apis.map.qq.com/ws/geocoder/v1/?output=json&';

    public function __construct(Client $http)
    {
        $this->http = $http;

        $this->apiKey = Config::get('coordinate.apiKey');
    }

    /**
     * 调用坐标解析
     * @param $address
     * @return string
     */
    public function Coordinate($address)
    {
        return $this->getCoordinateApi($address);
    }

    /**
     * @param $address
     * @return string
     * @throws Exception
     */
    private function getCoordinateApi($address){

        $url = $this->getUrl($address);

        $response = $this->http->get($url);

        return $this->checkStatus(collect(json_decode($response->getBody(), true)));

    }

    /**
     * @param $response
     * @return string
     * @throws Exception
     */
    private function checkStatus($response)
    {
        if ($response->get('status') === 0) {
            return $this->getFormatData($response);
        }
        throw new Exception('坐标解析错误,错误代码:'.$response->get('status') .'错误提示:'.$response->get('message'));
    }

    /**
     * 切割坐标
     * @param $response
     * @return string
     */
    private function getFormatData($response){

        $res = $response->get('result');

        return implode(',',$res['location']);
    }

    /**
     * @param $address
     * @return string
     */
    private function getUrl($address){

        return $this->url .'address=' . $address .'&key=' . $this->apiKey;

    }
}