# Kirby Blueprint Reader VS Kirby Architect

Because [Kirby Architect](https://github.com/AugustMiller/kirby-architect) is the only competitor, I have made a comparation table for both plugins.

| Feature                                                  | Blueprint Reader | Architect           
| -------------------------------------------------------- | ---------------- | ---------
| Support for global field definitions                     | Yes              | -
| Support for global field extends                         | Yes              | -
| Support for definitions and extends in structure fields  | Yes              | -
| Method to get the label                                  | -                | Yes
| Method to get an option label                            | -                | Yes
| Method to get options                                    | -                | Yes
| Method to generate a menu                                | -                | Yes
| Method to blacklist values                               | -                | Yes
| Method to step in the array                              | Yes              | -
| Method to get the blueprint filepath by template         | Yes              | -
| Method to get the blueprint data by a filepath           | Yes              | -
| Method to parse a blueprint array                        | Yes              | -

## Summery

Which one you need depends on your needs. They are very different in what you can do and how things work and how the syntax looks like.

**[Kirby Blueprint Reader](https://github.com/jenstornell/kirby-blueprint-reader)**
It's probably better for reading and parsing as it supports global field definitions, extends, structure fields and array stepping.

**[Kirby Architect](https://github.com/AugustMiller/kirby-architect)**
It's probably better for help with generating html as it supports methods for menus, options and labels. 