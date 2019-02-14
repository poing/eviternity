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
