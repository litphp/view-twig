<?php

declare(strict_types=1);

namespace Lit\View\Twig;

use Twig\Environment;

class TwigViewFactory
{
    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function load(string $name): TwigView
    {
        return new TwigView($this->twig->load($name));
    }
}
