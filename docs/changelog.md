# Changelog

**0.4**

- Support for translations.
- Support for users blueprints with `users/blueprint`.
- Support for multiple caches separated by return type.
- Support for array step like `fields/title/type`.
- Support for global options.
- Support for `.yaml` and `.php` extensions.
- Changed syntax from `bread::` to `b::`. 
- Changed arguments. Steps added and options is now an array.
- Changed `b::file()` to use filename as cache-key instead of path as default.
- Changed the behavior of the `$name` argument, which does no longer fallback to `default.yml`.
- Docs changed.
- Bugfixes and code enhancements.

**0.3**

- Fixed major bug with singleton class.
- Fixed major bug with `bread::parse()`.
- Added support for global field definitions in structure fields.
- Added support for global field definitions extends in structure fields.
- Added [compare](compare.md) to Kirby Architect.

**0.2**

- Complete rewrite 

**0.1**

- Initial release