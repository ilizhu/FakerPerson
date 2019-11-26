<?php

namespace FakerPerson\Provider;


class Address extends Base
{

    protected static $formats = [
        '{{country}}{{province}}{{city}}{{area}}'
    ];

    protected static $cites = [
        '北京', '上海', '天津', '重庆',
        '哈尔滨', '长春', '沈阳', '呼和浩特',
        '石家庄', '乌鲁木齐', '兰州', '西宁',
        '西安', '银川', '郑州', '济南',
        '太原', '合肥', '武汉', '长沙',
        '南京', '成都', '贵阳', '昆明',
        '南宁', '拉萨', '杭州', '南昌',
        '广州', '福州', '海口',
        '香港', '澳门'
    ];

    protected static $provinces = [
        '北京市', '天津市', '河北省', '山西省',
        '内蒙古自治区', '辽宁省', '吉林省',
        '黑龙江省', '上海市', '江苏省',
        '浙江省', '安徽省', '福建省', '江西省',
        '山东省', '河南省', '湖北省', '湖南省',
        '广东省', '广西壮族自治区', '海南省',
        '重庆市', '四川省', '贵州省', '云南省',
        '西藏自治区', '陕西省', '甘肃省', '青海省',
        '宁夏回族自治区', '新疆维吾尔自治区',
        '香港特别行政区', '澳门特别行政区', '台湾省'
    ];

    protected static $provinceAbbr = [
        '京', '皖', '渝', '闽',
        '甘', '粤', '桂', '黔',
        '琼', '冀', '豫', '黑',
        '鄂', '湘', '吉', '苏',
        '赣', '辽', '蒙', '宁',
        '青', '鲁', '晋', '陕',
        '沪', '川', '津', '藏',
        '新', '滇', '浙', '港',
        '澳', '台'
    ];

    protected static $areas = [
        '西夏区', '永川区', '秀英区', '高港区',
        '清城区', '兴山区', '锡山区', '清河区',
        '龙潭区', '华龙区', '海陵区', '滨城区',
        '东丽区', '高坪区', '沙湾区', '平山区',
        '城北区', '海港区', '沙市区', '双滦区',
        '长寿区', '山亭区', '南湖区', '浔阳区',
        '南长区', '友好区', '安次区', '翔安区',
        '沈河区', '魏都区', '西峰区', '萧山区',
        '金平区', '沈北新区', '孝南区', '上街区',
        '城东区', '牧野区', '大东区', '白云区',
        '花溪区', '吉利区', '新城区', '怀柔区',
        '六枝特区', '涪城区', '清浦区', '南溪区',
        '淄川区', '高明区', '金水区', '中原区',
        '高新开发区', '经济开发新区', '新区'
    ];

    protected static $country = [
        '中国'
    ];

    public function city()
    {
        return static::randomElement(static::$cites);
    }

    public function province()
    {
        return static::randomElement(static::$provinces);
    }

    public function stateAbbr()
    {
        return static::randomElement(static::$provinceAbbr);
    }

    public static function area()
    {
         return static::randomElement(static::$areas);
    }

    public static function country()
    {
         return static::randomElement(static::$country);
    }

    public function address()
    {
        $format = static::randomElement(static::$formats);
        return $this->generator->parse($format);
         //return $this->city() . static::area();
    }

    public static function postcode()
    {
        $prefix = str_pad(mt_rand(1, 85), 2, 0, STR_PAD_LEFT);
        $suffix = '00';

        return $prefix . mt_rand(10, 88) . $suffix;
    }
}
