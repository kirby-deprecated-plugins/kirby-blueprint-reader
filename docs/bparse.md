# b::parse()

Get a parsed blueprint data array by an own blueprint data array. It will include global field defintions, extends and translations.

- **$data** (array)
  *Path to the blueprint file*
- **$steps** (string)(optional)
  *Step the array to get your value.*
- **$options** (array)(optional)
  - **$language** (string)
    *The language of the fields. If no language is set, it will show all languages.*
  - **$definitions** (bool)
    *Turn global field definitions off by set it to false. It's set to true by default.*
- **return** (array)
  *It will return an array with blueprint data if found, else it will return null.*

### Basic examples

We use an own blueprint data array. Then we run it through the parser to include global field definitions, extends and translations.

```php
$data = array(
  'title' => 'My page',
  'fields' => array(
    'title' => array(
      'label' => array(
        'sv' => 'Hej världen!',
        'en' => 'Hello world!',
      ),
      'type' => 'title',
    )
  )
);

$data = b::parse($data);
print_r($data);
```

We can also use the step feature as second argument, to get the field title type and print it out.

```php
echo b::parse('project', 'fields/title/type');
```

### Advanced example

In this case we don't use the steps feature. Instead of having steps as a second argument we can set options as second argument instead.

```php
$data = array(
  'title' => 'My page',
  'fields' => array(
    'title' => array(
      'label' => array(
        'sv' => 'Hej världen!',
        'en' => 'Hello world!',
      ),
      'type' => 'title',
    )
  )
);

$options = array(
  'language' => 'sv',
  'definitions' => false
);

$data = b::parse('project', $options);
print_r($data);
```

To also use steps, we set it as the second argument and push the options to the third argument:

```php
$data = array(
  'title' => 'My page',
  'fields' => array(
    'title' => array(
      'label' => array(
        'sv' => 'Hej världen!',
        'en' => 'Hello world!',
      ),
      'type' => 'title',
    )
  )
);

$options = array(
  'language' => 'sv',
  'definitions' => false
);

echo b::parse('project', 'fields/title/type', $options);
```