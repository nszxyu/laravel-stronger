<?php

namespace Nszxyu\LaravelStronger\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SimplePaginator extends LengthAwarePaginator
{
    protected array $plus = [];

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge([
            'current_page'  => $this->currentPage,
            'list'          => $this->items->toArray(),
            'last_page'     => $this->lastPage(),
            'per_page'      => $this->perPage(),
            'total'         => $this->total()
        ], $this->plus);
    }

    /**
     * 修改数据
     * @param $items
     * @return $this
     */
    public function setItems($items): SimplePaginator
    {
        $this->items = $items instanceof Collection ? $items : Collection::make($items);
        return $this;
    }

    /**
     * 添加额外数据
     * @param $key
     * @param $value
     * @return $this
     */
    public function addPlus($key, $value): SimplePaginator
    {
        $this->plus[$key] = $value;
        return $this;
    }

    /**
     * 获取值
     * @param string $key
     * @return \Illuminate\Support\HigherOrderCollectionProxy|mixed|string
     */
    public function __get($key)
    {
        return $this->plus[$key] ?? '';
    }

    /**
     * 设置值
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->addPlus($name, $value);
    }
}
