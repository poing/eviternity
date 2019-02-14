```shell
mkdir -p src/Eviternity/Models src/Eviternity/database/migrations
```

```
.
├── composer.json
├── phpunit.xml
├── src
│   └── Eviternity
│       ├── database
│       │   └── migrations
│       └── Models
└── tests
    ├── BasicTest.php
    └── OrchestraTest.php 
```

```
cd laravel
php artisan make:model Everlasting -m
php artisan make:model Duration -m

mv app/Duration.php src/Eviternity/Models/.
mv app/Everlasting.php src/Eviternity/Models/.

mv database/migrations/*everlasting* src/Eviternity/database/migrations/.
mv database/migrations/*duration* src/Eviternity/database/migrations/.
```

```
.
├── composer.json
├── phpunit.xml
├── src
│   └── Eviternity
│       ├── database
│       │   └── migrations
│       │       ├── 0000_00_00_000000_create_durations_table.php
│       │       └── 0000_00_00_000000_create_everlastings_table.php
│       └── Models
│           ├── Duration.php
│           └── Everlasting.php
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
+    public static function check()
+    {
+        return true;
+    }
}
```


----



```shell
php artisan make:provider EviternityServiceProvider
mv app/Providers/EviternityServiceProvider.php src/Eviternity/.
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

