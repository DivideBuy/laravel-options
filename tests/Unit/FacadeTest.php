<?php

namespace DivideBuy\LaravelOptions\Tests\Unit;

use DivideBuy\LaravelOptions\Tests\TestCase;
use DivideBuy\LaravelOptions\LaravelOptionsFacade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DivideBuy\LaravelOptions\LaravelOption;

class FacadeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check if the facade retrieves the value
     *
     * @return void
     */
    public function testFacadeGetOption()
    {
        LaravelOptionsFacade::shouldReceive('get')
                              ->with('test-key', null)
                              ->andReturn('test-value');
        $this->assertEquals('test-value', get_option('test-key', null));
    }

    /**
     * Check if the facade sets the option value
     *
     * @return void
     */
    public function testFacadeSetOption()
    {
        LaravelOptionsFacade::shouldReceive('set')
                              ->with('set-key', 'set-value')
                              ->andReturn('set-value');
        $this->assertEquals('set-value', set_option('set-key', 'set-value'));
    }

    /**
     * Check if the facade sees if an option exists
     *
     * @return void
     */
    public function testFacadeChecksIfOptionExists()
    {
        LaravelOptionsFacade::shouldReceive('exists')
                              ->with('exists-key')
                              ->andReturn(true);
        $this->assertTrue(option_exists('exists-key'));
    }
}
