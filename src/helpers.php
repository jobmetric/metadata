<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

if(!function_exists('metadataGet')) {
    /**
     * Service get metadata
     *
     * @param Model       $model
     * @param string|null $key
     *
     * @return Collection|Model|null
     */
    function metadataGet(Model $model, string|null $key): Collection|Model|null
    {
        return Metadata::get($model, $key);
    }
}

if(!function_exists('metadataStore')) {
    /**
     * Service store metadata
     *
     * @param Model             $model
     * @param string            $key
     * @param string|array|null $value
     *
     * @return Model
     */
    function metadataStore(Model $model, string $key, string|array|null $value): Model
    {
        return Metadata::store($model, $key, $value);
    }
}

if(!function_exists('metadataDelete')) {
    /**
     * Service delete metadata
     *
     * @param Model       $model
     * @param string|null $key
     *
     * @return void
     */
    function metadataDelete(Model $model, string|null $key = null): void
    {
        Metadata::delete($model, $key);
    }
}
