<?php

namespace App\Support;

use Illuminate\Support\Fluent;
use Countable;
use IteratorAggregate;
use Traversable;
use ArrayIterator;

class ApiRecord extends Fluent implements Countable, IteratorAggregate
{
    public function __construct($attributes = [])
    {
        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) {
                if (is_array($value)) {
                    if (!array_is_list($value)) {
                        $attributes[$key] = new self($value);
                    } else {
                        $attributes[$key] = array_map(function ($item) {
                            return is_array($item) ? new self($item) : $item;
                        }, $value);
                    }
                }
            }
        }
        parent::__construct($attributes);
    }

    /**
     * Wrap API data (array, list, single object, or paginated response) into ApiRecord instances.
     *
     * @param  mixed  $data
     * @return mixed
     */
    public static function wrap($data)
    {
        if (is_null($data) || $data === false) {
            return [];
        }

        if (is_array($data)) {
            // Handle { "data": [...] } wrapper from Laravel API resources
            if (isset($data['data']) && is_array($data['data']) && (count($data) <= 4 || isset($data['current_page']))) {
                return self::wrap($data['data']);
            }

            if (array_is_list($data)) {
                return array_map(function ($item) {
                    return is_array($item) ? new self($item) : $item;
                }, $data);
            }

            return new self($data);
        }

        return $data;
    }

    public function count(): int
    {
        return count($this->attributes);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->attributes);
    }

    /**
     * Allows ApiRecord to be converted directly to its primary ID string in routes.
     * For example, route('areas.update', $area) converts to route('areas.update', $area->id).
     */
    public function __toString(): string
    {
        return (string) (
            $this->attributes['id']
            ?? $this->attributes['id_area']
            ?? $this->attributes['id_training_center']
            ?? $this->attributes['id_computer']
            ?? ''
        );
    }
}

