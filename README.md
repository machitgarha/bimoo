# Bimoo

Moodle declaration stubs, including classes, functions and globals, thanks to [php-stubs/generator](https://github.com/php-stubs/generator), helping IDEs and static analyzers.

**Note:** The stubs file is still incomplete (generated for a limited portion of stuff), and may not be updated regularly. However, contributions, including issues and pull requests, will be really welcomed.

## What is included?

First things first: The stubs file is generated from [official mirror Moodle repository](https://github.com/moodle/moodle/tree/master/lib).

Here is the list of paths (using glob pattern) scanned and included in the `stubs.php` (the initial slash means the root of the Moodle repository, i.e. the Moodle installation directory):

-   `/lib/**/*.php`

## How to use it?

First, thank you for using this.

Simply, require it in your `composer.json`:

```
composer require machitgarha/bimoo
```

Now, your IDE (or text editor) should show you the suggestions for Moodle functions and classes. Not limited to this, you can guide your static analyzer as well.

## Release management

To follow Moodle versions properly, and prevent from conflicts and confusions, instead of using [semantic versioning](https://semver.org), we use the following method:

Each version is in the form of `<MoodleVersion>.<Minor>`. `MoodleVersion` is the version of Moodle the release is based on. `Minor` is the state of this library for that specific Moodle version; in other words, it increases whenever a change is made for a specific version of Moodle. For example, `3.11.1.3` means the fourth series of changes supporting Moodle `3.11.1`.

Every Moodle version older than latest supported is followed in a separate branch. The branches are named as their Moodle version they follow, e.g. `3.9.9`. Ideally, `master` branch follows the latest Moodle version.

**Note:** There is no guarantee to support all versions Moodle supports. However, support is pretty much welcomed from the community (maybe you?).

## To-Do

-   Use GitHub Actions to automate the process. The workflow would be, cloning the repository of Moodle, switching to the latest stable version, run the generator for a list of predefined paths and files, commit the changes and push it back.

## Contributions

Feel free to do so.

## License

Licensed under [Apache License 2.0](./LICENSE.md).
