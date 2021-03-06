#### Create a Package

The `<vendor>/<name>` of this project will be `poing/eviternity`.  *Use your own package vendor/name.*

```shell
mkdir -p poing/eviternity
cd poing/eviternity
composer init
```
Skipping through the settings, you should find *at least* the following in your `composer.json`.

```json
{
    "name": "poing/eviternity",
    "require": {}
}
```

#### Add `orchestra/testbench`

Since Laravel 5.7 is *currently* available, we'll use version 3.7 of orchestra/testbench.  See the [version compatibility](https://github.com/orchestral/testbench#version-compatibility) for other Laravel versions.

```shell
composer require --dev --prefer-dist orchestra/testbench 3.7
```

The above command will add the `require-dev` section, *as shown below*.

```diff
{
    "name": "poing/eviternity",
-    "require": {}
+    "require": {},
+    "require-dev": {
+        "orchestra/testbench": "3.7"
+    }
}
```

#### Create **PSR-4** Paths

We'll create the `src` directory for the package files, and `tests` for our testing.

```shell
mkdir -p src tests
```

You should have the following directory structure.


```
.
├── composer.json
├── src
└── tests
```

#### **PSR-4** Autoload

To `autoload` the package and test files, we'll add the following.

```diff
{
    "name": "poing/eviternity",
    "require": {}
    "require": {},
    "require-dev": {
        "orchestra/testbench": "3.7"
-    }
+    },
+  "autoload": {
+    "psr-4": {
+      "Poing\\Eviternity\\": "src/"
+    }
+  },
+  "autoload-dev": {
+    "psr-4": {
+      "Poing\\Eviternity\\Tests\\": "tests/"
+    }
+  }
}
```

*I use the full `namespace` for my tests.  You could just call it `Tests\\`*

#### Our First Test

Our *first test* will use `phpunit`, just to *confirm* basic testing works.

##### `tests/BasicTest.php`

```php
<?php

namespace Poing\Eviternity\Tests;

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{

    public function testBasic()
    {
        $this->assertTrue(true);
    }

}
```

##### `phpunit.xml`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit>
    <testsuite name="Basic Test" >
        <file>./tests/BasicTest.php</file>
    </testsuite>
</phpunit>
```

```
.
├── composer.json
├── phpunit.xml
├── src
└── tests
    └── BasicTest.php
```

##### Run the Test

You can run the test with *either* of the following `phpunit` commands:

```
phpunit
./vendor/bin/phpunit 
```

```shell
PHPUnit 7.5.4 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 157 ms, Memory: 4.00MB

OK (1 test, 1 assertion)
```

#### Using `orchestra/testbench`

Replace `PHPUnit\Framework\TestCase` with `Orchestra\Testbench\TestCase` in your tests.

```diff
<?php

namespace Poing\Eviternity\Tests;

- use PHPUnit\Framework\TestCase;
+ use Orchestra\Testbench\TestCase;

class ...
```

##### `tests/OrchestraTest.php`

```
<?php

namespace Poing\Eviternity\Tests;

use Orchestra\Testbench\TestCase;

class OrchestraTest extends TestCase
{

    public function testBasic()
    {
        $this->assertTrue(true);
    }

}
```

##### Add the test to `phpunit.xml`

```diff
<?xml version="1.0" encoding="UTF-8"?>
<phpunit>
    <testsuite name="Basic Tests" >
        <file>./tests/BasicTest.php</file>
+       <file>./tests/OrchestraTest.php</file>
    </testsuite>
</phpunit>
```
##### Run the Test

**Do not use the *global* `phpunit`.  It will fail!**  *It needs the PSR-4 auto-loaded namespace information.*
 
Use `./vendor/bin/phpunit` from this point forward.  *To avoid having to rewrite your code.*

```shell
PHPUnit 7.5.4 by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: 556 ms, Memory: 10.00MB

OK (2 tests, 2 assertions)
```

[next](service_providers.md)
