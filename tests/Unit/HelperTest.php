<?php

namespace DivideBuy\LaravelOptions\Tests\Unit;

use DivideBuy\LaravelOptions\Tests\TestCase;
use DivideBuy\LaravelOptions\LaravelOption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HelperTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();
        LaravelOption::create([
            'key' => 'test-key',
            'value' => 'value'
        ]);
    }

    /**
     * Check if the Helper retrieves the value
     *
     * @return void
     */
    public function testHelperGetOption()
    {
        $this->assertEquals('value', get_option('test-key'));
        $this->assertEquals('value-two', get_option('test-key-two', 'value-two'));
        $this->assertNotEquals('value-three', get_option('test-key-two', 'value-two'));
    }

    /**
     * Check if the Helper sets the option value
     *
     * @return void
     */
    public function testHelperSetOption()
    {
        set_option('test-key', 'new-value');
        $this->assertDatabaseHas('db_options', ['key' => 'test-key', 'value' => 'new-value']);
        set_option('new-key', 'test-value');
        $this->assertDatabaseHas('db_options', ['key' => 'new-key', 'value' => 'test-value']);
    }

    /**
     * Check if the Helper sees if an option exists
     *
     * @return void
     */
    public function testHelperChecksIfOptionExists()
    {
        $this->assertTrue(option_exists('test-key'));
        $this->assertFalse(option_exists('bad-key'));
    }
}
