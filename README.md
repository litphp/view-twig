TwigView for lit
=======

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LitPHP/view-twig/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LitPHP/view-twig/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/LitPHP/view-twig/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/LitPHP/view-twig/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/LitPHP/view-twig/badges/build.png?b=master)](https://scrutinizer-ci.com/g/LitPHP/view-twig/build-status/master)

> Twig integration for lit

### Usage

#### Configuration

Merge `TwigView::configuration` into your air configuration. This requires a loader stub for `Twig_LoaderInterface`. 
Here's an example.

```php
C::instance(\Twig\Loader\FilesystemLoader::class, [
    YOUR_TEMPLATE_ROOT
])
```

#### Action integration

Use `TwigViewBuilderTrait` in your action base class. then in your action

```php
return $this->twig('templatefile.twig')->render([
    //template data
]);
```
