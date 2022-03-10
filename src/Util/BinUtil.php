<?php

namespace Nszxyu\LaravelStronger\Util;

/**
 * 二进制处理工具包
 */
class BinUtil
{
    public static function decToBinString($num, $length = 32){
        $str = str_pad(decbin($num), 32, '0', STR_PAD_LEFT);
        return preg_replace('/([0-1]{4})/', '\\1 ', $str);
    }
}