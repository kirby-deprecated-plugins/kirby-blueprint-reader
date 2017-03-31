# b::blueprint()

Get a blueprint data array by a blueprint name.

- **$name** (string)
  *Path to the blueprint file*
- **$steps** (string)(optional)
  *Step the array to get your value.*
- **$options** (array)(optional)
  - **$format** (array)
    *The format can be filepath or data. Default is data.*
  - **$language** (string)
    *The language of the fields. If no language is set, it will show all languages.*
  - **$definitions** (bool)
    *Turn global field definitions off by set it to false. It's set to true by default.*
- **return** (array)
  *It will return an array with blueprint data if found, else it will return null.*

### Basic examples

We use the blueprint name to get the blueprint data as array:

```php
$data = b::blueprint('project');
print_r($data);
```

We can also use the step feature as second argument, to get the field title type and print it out.

```php
echo b::blueprint('project', 'fields/title/type');
```

### Advanced example

In this case we don't use the steps feature. Instead of having steps as a second argument we can set options as second argument instead.

```php
$options = array(
  'language' => 'sv',
  'definitions' => false
);

$data = b::blueprint('project', $options);
print_r($data);
```

To also use steps, we set it as the second argument and push the options to the third argument:

```php
$options = array(
  'language' => 'sv',
  'definitions' => false
);

echo b::blueprint('project', 'fields/title/type', $options);
```