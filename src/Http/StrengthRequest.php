<?php
namespace Nszxyu\LaravelStronger\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class StrengthRequest extends Request
{

    /**
     * 返回数字非空数组
     * @param array|mixed  $keys
     * @return array
     */
    public function onlyNumericFilled(mixed $keys): array
    {
        $results = [];

        $input = $this->all();

        foreach (is_array($keys) ? $keys : func_get_args() as $key) {
            $value = data_get($input, $key);

            if (is_numeric($value)) {
                Arr::set($results, $key, $value);
            }
        }

        return $results;
    }
}