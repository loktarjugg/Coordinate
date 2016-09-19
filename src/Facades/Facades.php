<?php
namespace Loktarjugg\Coordinate\Facades;
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/19
 * Time: 上午9:50
 */
use Illuminate\Support\Facades\Facade;
class Facades extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'Coordinate';
    }
}