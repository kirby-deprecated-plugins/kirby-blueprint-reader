# Kirby Blueprint Reader

*Also shorted down as **BRead***.

*Version 0.3* - ***[Changelog](docs/changelog.md)***

**Supports**

- [x] Global field definitions.
- [x] Global field definitions in structure fields.
- [x] Global field definitions extends.
- [x] Global field definitions extends in structure fields.

**Cache**

The blueprint reader has a built in memory cache. It caches different types of data matched by a key.

- [x] Blueprint data
- [x] Blueprint filepaths
- [x] Global field definitions

**Todo**

- Support for languages in the blueprint.

## Kirby Blueprint Reader VS Kirby Architect

To get a full comparation to the biggest competitor, read: [Kirby Blueprint Reader VS Kirby Architect](docs/compare.md).

## Methods

If `$template` is not sent to the method, it will try to use `$page->intendedTemplate()` instead.

| Method        | Description           
| ------------- |-------------
| `bread::blueprint($template = null)`       | Returns an array with blueprint data.
| `bread::fields($template = null)`          | Returns an array with fields data.
| `bread::field($key, $template = null)`     | Returns an array with field data.
| `bread::file($template = null)`            | Returns the blueprint filepath.
| `bread::read($filepath, $cachekey = null)` | Returns an array with blueprint data, by filepath.
| `bread::parse($array)`                     | Returns an array with blueprint data, by an array.

### `bread::blueprint($template = null)`

Get the complete blueprint as array.

**Example 1**

If you don't send any arguments, it will try to use `$page->intendedTemplate()` as blueprint name.

```php
print_r(bread::blueprint());
```

**Example 2**

In this case we want to get `projects`. The second one will get the data from a memory cache.

```php
print_r(bread::blueprint('projects'));
print_r(bread::blueprint('projects'));
```

**Result**

```text
Array
(
  [title] => Projects
  [fields] => Array
    (
      [title] => Array
        (
          [label] => Title
          [type] => title
        )
      [text] => Array
        (
          [label] => Text
          [type] => textarea
        )
    )
)
```

### `bread::fields($template = null)`

Get the fields as array.

**Example 1**

If you don't send any arguments, it will try to use `$page->intendedTemplate()` as blueprint name.

```php
print_r(bread::fields());
```

**Example 2**

In this case we want to get `projects`. The second one will get the data from a memory cache.

```php
print_r(bread::fields('projects'));
print_r(bread::fields('projects'));
```

**Result**

```text
Array
(
  [title] => Array
    (
      [label] => Title
      [type] => title
    )
  [text] => Array
    (
      [label] => Text
      [type] => textarea
    )
)
```

### `bread::field($key, $template = null)`

Get the field as array. A field key is required.

**Example 1**

If you don't send a `$template`, it will try to use `$page->intendedTemplate()` as blueprint name.

```php
print_r(bread::field('title'));
```

**Example 2**

In this case we want to get `title`. The second one will get the data from a memory cache.

```php
print_r(bread::field('title', 'projects'));
print_r(bread::field('title', 'projects'));
```

**Result**

```text
Array
(
  [label] => Title
  [type] => title
)
```

### `bread::file($template = null)`

Get the filepath.

**Example 1**

If you don't send a `$template`, it will try to use `$page->intendedTemplate()` as blueprint name.

```php
print_r(bread::file());
```

**Example 2**

In this case we want to get `title`. The second one will get the data from a memory cache.

```php
print_r(bread::file('projects'));
print_r(bread::file('projects'));
```

**Result**

```text
C:\xampp\htdocs\kirby\2.4.1\site\blueprints\projects.yml
```

### `bread::parse($array)`

You send a blueprint as an array. It will then parse it and include global field definitions and then send it back.

**Example**

If you have a global field definition that is named `date`, it will replace that string with a global field definition array.

```php
$array = array(
  'fields' => array(
    'title' => array(
      'label' => 'Title',
      'type' => 'title'
    ),
    'definition' => 'date',
  )
);
print_r(bread::parse($array));
```

**Result**

```text
Array
(
  [fields] => Array
    (
      [title] => Array
        (
          [label] => Title
          [type] => title
        )
      [date] => Array
        (
          [label] => Date
          [type] => date
        )
    )
)
```

## Requirements

- [**Kirby**](https://getkirby.com/) 2.4.1+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/username/kirby-blueprint-reader/issues/new).

## License

[**MIT**](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Jens Törnell](https://github.com/jenstornell)