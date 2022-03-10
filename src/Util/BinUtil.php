<?php

namespace Nszxyu\LaravelStronger\Util;

/**
 * 二进制处理工具包
 */
class BinUtil
{
    /**
     * 转换为二进制字符串
     * @param $num
     * @param int $length
     * @return array|string|string[]|null
     */
    public static function decToBinString($num, $length = 32){
        $str = str_pad(decbin($num), $length, STR_PAD_LEFT);
        return preg_replace('/([0-1]{4})/', '\\1 ', $str);
    }
}