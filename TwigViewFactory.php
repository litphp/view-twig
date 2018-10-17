<?php

declare(strict_types=1);

namespace Lit\View\Twig;

class TwigViewFactory
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function load(string $name): TwigView
    {
        return new TwigView($this->twig->load($name));
    }
}