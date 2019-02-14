```
composer init
```

```
{
    "name": "vendor/name",
    "require": {}
}
```

```
composer require --dev --prefer-dist orchestra/testbench 3.7
```

```diff
{
    "name": "vendor/name",
-    "require": {}
+    "require": {},
+    "require-dev": {
+        "orchestra/testbench": "3.7"
+    }
}
```

```diff
// composer.json
-  "require": {}
+  "require": {},
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
