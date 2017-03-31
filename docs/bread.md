# b::read()

Get a blueprint data array by a blueprint filepath.

- **$filepath** (string)
*Path to the blueprint file*
- **$steps** (string)(optional)
  *Step the array to get your value.*
- **$options** (array)(optional)
  - **$cache_key** (string)
    *Name of the cache key. If no cache key name is set, it will use the filename.*
  - **$language** (string)
    *The language of the fields. If no language is set, it will show all languages.*
  - **$definitions** (bool)
    *Turn global field definitions off by set it to false. It's set to true by default.*
- **return** (array)
  *It will return an array with blueprint data if found, else it will return null.*

### Basic examples

We use the filepath to get the blueprint data as array:

```php
$data = b::read('C:\xampp\htdocs\kirby\site\blueprints\project.yml');
print_r($data);
```

We can also use the step feature as second argument, to get the field title type and print it out.

```php
echo b::read('C:\xampp\htdocs\kirby\site\blueprints\project.yml', 'fields/title/type');
```

### Advanced example

In this case we don't use the steps feature. Instead of having steps as a second argument we can set options as second argument instead.

```php
$options = array(
  'cache_key' => 'my-cache-key',
  'language' => 'sv',
  'definitions' => false
);

$data = b::read('C:\xampp\htdocs\kirby\site\blueprints\project.yml', $options);
print_r($data);
```

To also use steps, we set it as the second argument and push the options to the third argument:

```php
$options = array(
  'cache_key' => 'my-cache-key',
  'language' => 'sv',
  'definitions' => false
);

echo b::read('C:\xampp\htdocs\kirby\site\blueprints\project.yml', 'fields/title/type', $options);
```