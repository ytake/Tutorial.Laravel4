<?php
namespace App\Repositories\Fluent;

use Carbon\Carbon;

/**
 * Class AbstractFluent
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
abstract class AbstractFluent implements FluentInterface
{
    /** @var array */
    protected $errors;

    /** @var string  query cache key */
    protected $cacheKey;

    /** @var string  table name */
    protected $table;

    /** @var string  primary key */
    protected $primary = 'id';

    /**
     * add
     * @param array $attributes
     * @return mixed
     */
    public function add(array $attributes)
    {
        $attributes['created_at'] = Carbon::now()->toDateTimeString();
        $attributes['updated_at'] = Carbon::now()->toDateTimeString();
        return \DB::connection('sqlite')->table($this->table)->insertGetId($attributes);
    }

    /**
     * get all
     * @param array $columns
     * @return \stdClass
     */
    public function all(array $columns = ['*'])
    {
        return \DB::connection('sqlite')->table($this->table)->get($columns);
    }

    /**
     * required cache
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, array $columns = ['*'])
    {
        return \DB::connection('sqlite')->table($this->table)
            ->where($this->primary, $id)
            ->remember(120, $this->cacheKey . $id)->first($columns);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        // cache forget
        \Cache::forget($this->cacheKey . $id);
        return \DB::connection('sqlite')->table($this->table)
            ->where($this->primary, $id)->delete();
    }

    /**
     * @param $id
     * @param array $attributes
     * @return int
     */
    public function update($id, array $attributes)
    {
        $attributes['updated_at'] = Carbon::now()->toDateTimeString();
        // cache forget
        \Cache::forget($this->cacheKey . $id);
        return \DB::connection('sqlite')->table($this->table)
            ->where($this->primary, $id)->update($attributes);
    }

    /**
     * get \Illuminate\Database\Query\Builder instance
     * @param $connection specified database connection / 接続するデータベースを指定します。
     * @return \Illuminate\Database\Query\Builder
     */
    public function getConnection($connection)
    {
        return \DB::connection($connection)->table($this->table);
    }

}