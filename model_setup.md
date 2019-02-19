#### Preparing Our Model

First we need to prepare our model and migration.  We'll add an integer field called `alpha` for simple testing **and** make it *fillable*.

```diff
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDurationsTable extends Migration
{

    public function up()
    {
        Schema::create('durations', function (Blueprint $table) {
            $table->increments('id');
+            $table->integer('alpha');
            $table->timestamps();
        });
    }
    ...
```

```diff
<?php

namespace Poing\Eviternity\Models;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{

+    protected $fillable = [
+        'alpha',
+    ];
    ...
```

#### Testing with Tinker

Using tinker, we'll run through the Model testing.  Before adding them to your tests.

```
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.2.15-1+ubuntu18.04.1+deb.sury.org+1 — cli) by Justin Hileman
>>> $data = new Poing\Eviternity\Models\Duration;
=> Poing\Eviternity\Models\Duration {#2905}
>>> $data->alpha = 111;
=> 111
>>> $data->save();
=> true
>>> $verify = Poing\Eviternity\Models\Duration::first()
=> Poing\Eviternity\Models\Duration {#2914
     id: 1,
     alpha: 111,
     created_at: "2019-01-01 00:00:00",
     updated_at: "2019-01-01 00:00:00",
   }
>>> $verify->alpha;
=> 111
```

#### Adding the Test

Just like we did with tinker, let's add our test.


```diff
<?php

namespace Poing\Eviternity\Tests\Models;

use Orchestra\Testbench\TestCase;
use Poing\Eviternity\Models\Duration as Duration;

class DurationTest extends TestCase
{

+    public function testSimpleDB()
+    {
+        $value = 1234;
+        $data = new \Poing\Eviternity\Models\Duration;
+        $data->alpha = $value;
+        $this->assertTrue($data->save());
+
+        $verify = \Poing\Eviternity\Models\Duration::first();
+        $this->assertEquals($value, $verify->alpha);
+    }
    ...
```

*that's all, hope it helps!*


