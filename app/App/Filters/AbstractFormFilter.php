<?php
namespace App\Filters;

/**
 * Class AbstractFormFilter
 * @package App\Filters
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
abstract class AbstractFormFilter
{
    /**
     * @return mixed
     */
    protected function redirectForm()
    {
        $explode = explode('.', \Route::currentRouteName());
        return str_replace(end($explode), 'form', \Route::currentRouteName());
    }
} 