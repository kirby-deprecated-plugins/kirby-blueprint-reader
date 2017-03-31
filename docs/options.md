# Options

```php
c::set('blueprint.reader.language', null);
c::set('blueprint.reader.definitions', true);
c::set('blueprint.reader.format', 'array');
```

### blueprint.reader.language

Blueprint fallback language if no `language` argument is sent. It defaults to `null` which will show all translated values.

### blueprint.reader.definitions

You can enable or disable global field definitions by sending an argument to the function, or use this option as fallback. It defaults to `true` which means that global fields definitions will be included.

### blueprint.reader.format

The blueprint format that your blueprint will be returned. It can be `array` or `filepath`.