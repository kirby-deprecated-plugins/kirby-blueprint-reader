# b::file()

Get a filepath by a blueprint name.

- **$name** (string)
  *Path to the blueprint file*
- **return** (array)
  *It will return a blueprint filepath if found, else it will return null.*

### Basic example

We use the blueprint name to get the blueprint filepath:

```php
echo b::file('project');
```