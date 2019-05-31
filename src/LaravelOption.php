<?php

namespace DivideBuy\LaravelOptions;

use Illuminate\Database\Eloquent\Model;

class LaravelOption extends Model
{
    /**
     * The table that this model should read from
     *
     * @var string
     */
    protected $table = 'db_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Whether the model should use timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Check if a key exists in the database
     *
     * @param string $key
     * @return bool
     */
    public function exists($key) : bool
    {
        return self::where('key', $key)->exists();
    }

    /**
     * Return the value for a given key
     * If the Key doesn't exist then return a default value
     *
     * @param string $key
     * @param string $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $option = self::where('key', $key)->first();
        if ($option instanceof LaravelOption) {
            return $option->value;
        }

        return $default;
    }

    /**
     * Set a key in the database
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function set($key, $value = null)
    {
        $option = self::updateOrCreate(['key' => $key], ['value' => $value]);
        return $option->value;
    }

    /**
     * Delete a key from the database
     *
     * @param string $key
     * @return boolean
     */
    public function remove($key) : bool
    {
        return (bool) self::where('key', $key)->delete();
    }
}