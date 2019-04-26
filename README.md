TwigView for lit
=======

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LitPHP/view-twig/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LitPHP/view-twig/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/LitPHP/view-twig/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/LitPHP/view-twig/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/LitPHP/view-twig/badges/build.png?b=master)](https://scrutinizer-ci.com/g/LitPHP/view-twig/build-status/master)

> Twig integration for lit

### Usage

In a standard [litphp/project](https://github.com/litphp/project):

+ add dependency & install 

```bash
composer require litphp/view-twig
```

+ append configuration

Create a template dir in your project root, says `template`. Write your first template file `templates/index.twig`
```twig
Hello {{name}}!
```

Merge `TwigView::configuration` into your `configuration.php`.
```php
$configuration += \Lit\View\Twig\TwigView::configuration(C::instance(\Twig\Loader\FilesystemLoader::class, [
    __DIR__ . '/templates',
]));
```

+ integration in action class

In `src/BaseAction.php`, use the trait `TwigViewBuilderTrait`
```php
abstract class BaseAction extends BoltAbstractAction
{
    use \Lit\View\Twig\TwigViewBuilderTrait;
```

Change your `src/HomeAction.php` to render page use twig

```php
class HomeAction extends BaseAction
{
    protected function main(): ResponseInterface
    {
        return $this->twig('index.twig')->render(['name' => 'twig']);
    }
```

That's all! Run your app by `php -S 127.0.0.1:3080 public/index.php`, and open <http://127.0.0.1:3080/>. You should see greetings from twig template "Hello twig!"
