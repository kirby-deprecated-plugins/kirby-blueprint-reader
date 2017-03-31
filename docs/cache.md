# Cache

The blueprint reader has a built in memory cache. You don't need to do anything to set it up. It's always working behind the scenes and does not save any files because it's stored in the memory.

## Cached types

There are three different types of data that will be cached:

- [x] Blueprint data `blueprint.reader.data`
- [x] Blueprint filepaths `blueprint.reader.files`
- [x] Global field definitions `blueprint.reader.definitions`

### Storage

The cached data is stored in the memory. After your function calls are made you can look at your cache.

```php
print_r(kirby()->get('option', 'blueprint.reader.data'));
print_r(kirby()->get('option', 'blueprint.reader.files'));
print_r(kirby()->get('option', 'blueprint.reader.definitions'));
```

### Blueprint data

This cache stores the full blueprint arrays, if you have used the `b::blueprint()`.

### Blueprint filepaths

This cache stores the blueprint filepaths, if you have used the `b::read()` method.

### Global field definitions

This cache stores the blueprint global field definitions. All the methods that returns the blueprint data array will parse the global field definitions.