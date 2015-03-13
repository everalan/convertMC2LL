# convertMC2LL
将百度地图平面投影坐标（墨卡托）转换为经纬度坐标

# 用在什么场景
使用PHP来调用百度地图API，某些情况下得到的是投影坐标，需要转换为经纬度坐标

# 为什么要写这个东西
首先，百度地图最好用
第二，百度接口很不准，搜个西城区的地址给你定位到门头沟去
第三，百度有些隐藏接口非常好用
第四，隐藏接口坐标是投影坐标，需要转换成经纬度坐标
第五，只有百度知道怎么转换
第六，只有百度地图JS文件能看到源码

所以就写了这么个程序来将投影坐标转换为经纬度坐标。当然是根据百度地图js原来来改造的。
# 使用方法
非常简单
[php]
include 'src/Baidumap.php';
$baidu = new Baidumap();
$p = new b4(1294830854, 484857493);
$ll = $baidu->convertMC2LL($p);
var_dump($ll);
[/php]

# 常用场景举例
需要将用户输入的地址转换成经纬度坐标。百度提了Geocoding API 
http://developer.baidu.com/map/index.php?title=webapi/guide/webservice-geocoding 
但是这个接口太傻，不是地址不存在，就是把昌平的地址定位到门头沟去。

后来发现一个未公开的接口 
http://api.map.baidu.com/?qt=s&c=131&wd=%E9%87%91%E5%9F%9F%E5%8D%8E%E5%BA%9C&rn=10&ie=utf-8&oue=1&res=api
这个接口好用，基本上在百度地图首页能搜到的地址这里都能搜到，而且即使你输错了地址也会有一个字段（suggest_query）告诉你正确的地址应该叫什么

但是这个接口返回的坐标是投影坐标：(1294830854,484857493)，这个时候就需要将投影坐标转换为经纬度坐标。
