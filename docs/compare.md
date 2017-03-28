# Kirby Blueprint Reader VS Kirby Architect

Because [Kirby Architect](https://github.com/AugustMiller/kirby-architect) is the only competitor, I have made a comparation table for both plugins.

| Feature                                                  | Blueprint Reader | Architect           
| -------------------------------------------------------- | ---------------- | ---------
| Support for php extension                                | No               | No
| Support for yml extension                                | Yes              | Yes
| Support for yaml extension                               | No               | Yes
| Support for translations                                 | No               | Yes
| Support for global field definitions                     | Yes              | No
| Support for global field definitions in structure fields | Yes              | No
| Support for global field extends                         | Yes              | No
| Support for global field extends in structure fields     | Yes              | No
| Support for Kirby CLI                                    | Yes              | No
| Support for cache                                        | Yes              | Yes
| Method to get the label                                  | No               | Yes
| Method to get an option label                            | No               | Yes
| Method to get options                                    | No               | Yes
| Method to generate a menu                                | No               | Yes
| Method to blacklist values                               | No               | Yes
| Method to get the full blueprint                         | Yes              | Yes
| Method to get the fields                                 | Yes              | No
| Method to get a specific field                           | Yes              | No
| Method to get the blueprint filepath by template         | Yes              | No
| Method to get the blueprint data by a filepath           | Yes              | No
| Method to parse a blueprint array                        | Yes              | No

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