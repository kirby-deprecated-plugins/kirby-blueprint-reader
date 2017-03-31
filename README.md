# Kirby Blueprint Reader

A very easy to use blueprint reader for Kirby CMS.

*Version 0.4* - ***[Changelog](docs/changelog.md)***

**Features / Supports**

- [x] Global field definitions
- [x] Global field extends
- [x] Translated fields
- [x] Structure fields
- [x] Simple array walking
- [x] Caching

## Basic examples

If you have a project blueprint, you can get the title field type by this one-liner:

```php
echo b::blueprint('project', 'fields/title/type');
```

If you want the complete blueprint data array, you can do that like this:

```php
$data = b::blueprint('project');
print_r($data);
```

## Methods

These are the methods you can use. Read more about them if you need more advanced configurations.

- **[b::blueprint](docs/bblueprint.md)($name, $steps, $options = array())**
  *Get the blueprint data array by template.*
- **[b::read](docs/bread.md)($filepath, $steps, $options = array())**
  *Get the blueprint data array by filepath.*
- **[b::file](docs/bfile.md)($name, $options = array())**
  *Get the blueprint filepath by template.*
- **[b::parse](docs/bparse.md)($data, $steps, $options)**
  *Get the parsed blueprint data array by blueprint data array.*

## Table of contents

- [Cache](docs/cache.md)
- [Options](options.md)
- [Differences to Kirby Architect](docs/compare.md)

## Requirements

- [**Kirby**](https://getkirby.com/) 2.4.1+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/username/kirby-blueprint-reader/issues/new).

## License

[**MIT**](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Jens Törnell](https://github.com/jenstornell)