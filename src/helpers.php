<?php

if (!function_exists('get_option')) {
    
    /**
     * Get option
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    function get_option($key, $value = null)
    {
        return app('laravel-options')->get($key, $value);
    }
}

if (!function_exists('set_option')) {
    
    /**
     * Set option
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    function set_option($key, $value = null)
    {
        return app('laravel-options')->set($key, $value);
    }
}

if (!function_exists('option_exists')) {
    
    /**
     * Check if option exists
     *
     * @param string $key
     * @return bool
     */
    function option_exists($key) : bool
    {
        return app('laravel-options')->exists($key);
    }
}
