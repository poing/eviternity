<?php

namespace Poing\Eviternity\Tests\Models;

use Orchestra\Testbench\TestCase;
use Poing\Eviternity\Models\Duration as Duration;

class DurationTest extends TestCase
{

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        //$this->artisan('migrate', ['--database' => 'testing']);
        $this->artisan('migrate');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        // Make sure php-sqlite3 is installed on the system.
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Get package providers.  At a minimum this is the package
     * being tested, but also would include packages upon which
     * our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the
     * 'providers' array in the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Poing\Eviternity\EviternityServiceProvider::class,
            //'Cartalyst\Sentry\SentryServiceProvider',
            //'YourProject\YourPackage\YourPackageServiceProvider',
        ];
    }

    public function testBasic()
    {
        $this->assertTrue(Duration::probe());
    }


    public function testSimpleCreate()
    {
        $test = new \Poing\Eviternity\Models\Duration;
        $test->alpha = 100;
        $this->assertTrue($test->save());
    }

    public function testSimpleRead()
    {
        $test = new \Poing\Eviternity\Models\Duration;
        $test->alpha = 50;
        $test->save();

        $test = \Poing\Eviternity\Models\Duration::first();
        $this->assertEquals(50, $test->alpha);
        //$this->assertTrue(false);
    }


}
