# purity

A conflict-free utility library.

[![Build Status](https://travis-ci.org/aaemnnosttv/purity.svg?branch=master)](https://travis-ci.org/aaemnnosttv/purity)

## Overview

Purity is an experimental library aimed at providing utility functions and classes without the risk of conflicting with any other dependencies (including itself).

This is accomplished primarily by composing the entire codebase with anonymous functions and classes. 
Combined with a simple file-based structure, utilities can be easily accessed by name, without leaving any footprint on any namespace.

## Basic Usage

Because the API is exposed through anonymous components, autoloading via Composer is not possible.

Instead, all components are made available through a Factory which is retrieved by `factory.php`.

```php
# ./ current directory
# ./purity/
$factory = include 'purity/factory.php';
```

From here you can retrieve a component by accessing it as a property, or calling it as a method.

```php
$each = $factory->each;
$each($iterable, function ($item) {
    // do something
});

// OR

$factory->each($iterable, function ($item) {
    // do something
});
```

## Reference Safety

Each instance returned from the factory is a copy of its source, no two are the same.

That means...

```php
$factory->each !== $factory->each
```