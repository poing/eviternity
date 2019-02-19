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
