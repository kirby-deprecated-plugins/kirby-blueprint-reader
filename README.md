# Kirby Blueprint

Blueprints are used in the panel. Sometimes it can be useful to have access to this data even from a snippet or a template. It's possible with this plugin.

## Features

- Really simple syntax
- Support global field definitions
- Support for `yml`, `yaml` and `php` blueprint extensions

## Install

1. Add `blueprint` folder into `/site/plugins/`.
1. Use the plugin by the instructions below.

## Usage

### Example blueprint

I will use the blueprint example below when explaining the blueprint methods.

```md
title: Default
fields:
  title:
    label: Title
    type:  text
```

### blueprint::get()

Get the blueprint as array.

```php
echo blueprint::get();
```

Get the blueprint as array by template.

```php
echo blueprint::get( 'default' );
```


**The output will be something like this:**

```md
[title] => Default
[fields] => Array
  (
    [title] => Array (
        [label] => Title
        [type] => text
    )
  )
)
```

### blueprint::field( $field )

Get a blueprint field as array.

```php
echo blueprint::field( 'title' );
```

Get a blueprint field as array by template.

```php
echo blueprint::field( 'title', 'default' );
```

**The output will be something like this:**

```md
Array (
  [label] => Title
  [type] => text
)
```

### blueprint::item( $field, $item )

Get a blueprint item as array or string (depending on what it contains).

```php
echo blueprint::item( 'title', 'label' );
```

Get a blueprint item as array or string by template.

```php
echo blueprint::item( 'title', 'label', 'default' );
```

**The output will be something like this:**

```md
Title
```