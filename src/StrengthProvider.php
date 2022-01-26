<?php
namespace Nszxyu\LaravelStronger;

use Illuminate\Support\ServiceProvider;
use Nszxyu\LaravelStronger\Http\StrengthRequest;
use Nszxyu\LaravelStronger\Pagination\SimplePaginator;

class StrengthProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StrengthRequest::class, function ($app){
            return StrengthRequest::createFrom($app->make('request'));
        });
        $this->app->bind('Illuminate\Pagination\LengthAwarePaginator', function ($app, $options) {
            return (new SimplePaginator($options['items'], $options['total'], $options['perPage'], $options['currentPage'], $options['options']));
        });
    }
}