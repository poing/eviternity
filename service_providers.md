```shell
mkdir -p src/Models src/database/migrations
```

```
.
├── composer.json
├── phpunit.xml
├── src
│   ├── database
│   │   └── migrations
│   └── Models
└── tests
    ├── BasicTest.php
    └── OrchestraTest.php 
```

```
cd laravel
php artisan make:model Everlasting -m
php artisan make:model Duration -m

mv app/Duration.php src/Models/.
mv app/Everlasting.php src/Models/.

mv database/migrations/*everlasting* src/database/migrations/.
mv database/migrations/*duration* src/database/migrations/.
```

```
.
├── composer.json
├── phpunit.xml
├── src
│   ├── database
│   │   └── migrations
│   │       ├── 0000_00_00_000000_create_durations_table.php
│   │       └── 0000_00_00_000000_create_everlastings_table.php
│   └── Models
│       ├── Duration.php
│       └── Everlasting.php
└── tests
    ├── BasicTest.php
    └── OrchestraTest.php
```


----

```diff
<?php

- namespace App;
+ namespace Poing\Eviternity\Models;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
-    //
+    /**
+     * Used to test access to this class
+     */
+    public static function probe()
+    {
+        return true;
+    }
}
```


----



```shell
php artisan make:provider EviternityServiceProvider
mv app/Providers/EviternityServiceProvider.php src/.
```

```diff
<?php

- namespace App\Providers;
+ namespace Poing\Eviternity;

use Illuminate\Support\ServiceProvider;

class EviternityServiceProvider extends ServiceProvider
{
    ...
```

```diff
{
  "name": "poing/eviternity",
  "require": {},
  "require-dev": {
    "orchestra/testbench": "3.7"
  },
  "autoload": {
    "psr-4": {
      "Poing\\Eviternity\\": "src/"
    }
  },
  "autoload-dev": {
    "psr-4": {
      "Poing\\Eviternity\\Tests\\": "tests/"
    }
-  }
+  },
+  "extra": {
+    "laravel": {
+      "providers": [
+        "Poing\\Eviternity\\EviternityServiceProvider"
+      ]
+    }
+  }
}
```

#### Migrations

We'll add `loadMigrationsFrom()` in the `boot()` section of our *Service Provider*.

```diff
<?php

namespace Poing\Eviternity;

use Illuminate\Support\ServiceProvider;

class EviternityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
-        //
+        // Load Migrations
+        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
```


#### Using `orchestra/testbench` in our test.

There are three `3` tasks necessary to use `orchestra/testbench` in our tests.

1. Set up the database used for testing
1. Run the migrations 
1. Load the Laravel Service Provider

##### Setting Up the Database for Testing

```diff
<?php

namespace Poing\Eviternity\Tests\Models;

use Orchestra\Testbench\TestCase;
use Poing\Eviternity\Models\Duration as Duration;

class DurationTest extends TestCase
{

+    protected function getEnvironmentSetUp($app)
+    {
+        $app['config']->set('database.default', 'testbench');
+        $app['config']->set('database.connections.testbench', [
+            'driver'   => 'sqlite',
+            'database' => ':memory:',
+            'prefix'   => '',
+        ]);
+    }
    ...
``` 
