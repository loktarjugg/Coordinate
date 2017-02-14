# Coordinate
通过腾讯地图api将省市区地址转化为标准坐标

#安装
通过composer安装
`composer require loktarjugg/coordinate`

#配置
*注册`ServiceProvider`
`\Loktarjugg\Coordinate\CoordinateServiceProvider::class,`

*注册`aliases`
`'Coordinate'    =>\Loktarjugg\Coordinate\Facades\Facades::class`

*创建配置文件
`php artisan vendor:publish`

*然后修改配置文件的key

#使用
`Coordinate::coordinate('上海市华山路888号');`





