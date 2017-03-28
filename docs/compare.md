# Kirby Blueprint Reader VS Kirby Architect

Because [Kirby Architect](https://github.com/AugustMiller/kirby-architect) is the only competitor, I have made a comparation table for both plugins.

| Feature                                                  | Blueprint Reader | Architect           
| -------------------------------------------------------- | ---------------- | ---------
| Support for php extension                                | -                | -
| Support for yml extension                                | Yes              | Yes
| Support for yaml extension                               | -                | Yes
| Support for translations                                 | -                | Yes
| Support for global field definitions                     | Yes              | -
| Support for global field definitions in structure fields | Yes              | -
| Support for global field extends                         | Yes              | -
| Support for global field extends in structure fields     | Yes              | -
| Support for Kirby CLI                                    | Yes              | -
| Support for cache                                        | Yes              | Yes
| Method to get the label                                  | -                | Yes
| Method to get an option label                            | -                | Yes
| Method to get options                                    | -                | Yes
| Method to generate a menu                                | -                | Yes
| Method to blacklist values                               | -                | Yes
| Method to get the full blueprint                         | Yes              | Yes
| Method to get the fields                                 | Yes              | -
| Method to get a specific field                           | Yes              | -
| Method to get the blueprint filepath by template         | Yes              | -
| Method to get the blueprint data by a filepath           | Yes              | -
| Method to parse a blueprint array                        | Yes              | -

## Summery

Which one you need depends on your needs. They are very different in what you can do and how things work and how the syntax looks like.

If you need these things [Kirby Blueprint Reader]() might be better:

- Support for global field definitions and extends and support for them in structure fields.
- Many methods like fields, field, file, read and parse.
- Kirby CLI support

If you need these things maybe [Kirby Architect](https://github.com/AugustMiller/kirby-architect) is better:

- Translation support.
- Yaml extension support.
- Value blacklist.
- Methods for menu generation, labels and options.

Both supports caching and the `yml` extension.