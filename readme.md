```
composer init
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
