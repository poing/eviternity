```shell
mkdir -p poing/eviternity
cd poing/eviternity
composer init
```

```shell
mkdir -p src/Eviternity tests
```

```
.
├── composer.json
├── src
│   └── Eviternity
└── tests
```

```
{
    "name": "poing/eviternity",
    "require": {}
}
```

```
composer require --dev --prefer-dist orchestra/testbench 3.7
```

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

```
#mkdir -p src/Eviternity tests
.
├── composer.json
├── src
│   └── Eviternity
└── tests
```
