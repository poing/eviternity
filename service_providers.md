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

