<?php

namespace DivideBuy\LaravelOptions\Tests\Unit;

use DivideBuy\LaravelOptions\Tests\TestCase;
use DivideBuy\LaravelOptions\LaravelOption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check if the facade retrieves the value
     *
     * @return void
     */
    public function testGetOption()
    {
        LaravelOption::create([
            'key' => 'test-key',
            'value' => 'value'
        ]);
        $this->assertEquals('value', (new LaravelOption())->get('test-key'));
    }

    /**
     * Check if the facade sets the option value
     *
     * @return void
     */
    public function testSetOption()
    {
        LaravelOption::create([
            'key' => 'test-key',
            'value' => 'value'
        ]);

        (new LaravelOption())->set('test-key', 'new-value');
        $this->assertEquals('new-value', (new LaravelOption())->get('test-key'));
        $this->assertDatabaseHas('db_options', ['key' => 'test-key', 'value' => 'new-value']);

        (new LaravelOption())->set('test-key');
        $this->assertNull((new LaravelOption())->get('test-key'));
        $this->assertDatabaseHas('db_options', ['key' => 'test-key', 'value' => null]);

        $this->assertDatabaseMissing('db_options', ['key' => 'new-key', 'value' => 'test-value']);
        (new LaravelOption())->set('new-key', 'test-value');
        $this->assertDatabaseHas('db_options', ['key' => 'new-key', 'value' => 'test-value']);
    }

    /**
     * Check if the facade sees if an option exists
     *
     * @return void
     */
    public function testChecksIfOptionExists()
    {
        $this->assertFalse((new LaravelOption())->exists('test-key'));
        LaravelOption::create([
            'key' => 'test-key',
            'value' => 'value'
        ]);
        $this->assertTrue((new LaravelOption())->exists('test-key'));
    }

    /**
     * Test option delete methods
     *
     * @return void
     */
    public function testOptionDeletes()
    {
        LaravelOption::create([
            'key' => 'test-key',
            'value' => 'value'
        ]);
        $this->assertDatabaseHas('db_options', ['key' => 'test-key', 'value' => 'value']);
        
        (new LaravelOption())->remove('test-key');
        $this->assertDatabaseMissing('db_options', ['key' => 'test-key', 'value' => 'value']);
    }
}
