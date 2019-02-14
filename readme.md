#### Create a Package

The `<vendor>/<name>` of this project will be `poing/eviternity`.  *Use your own package name.*

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
