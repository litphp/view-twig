<?php

declare(strict_types=1);

namespace Lit\View\Twig;

trait TwigViewBuilderTrait
{
    /**
     * @var TwigViewFactory
     */
    protected $twigViewFactory;

    public function injectTwigViewFactory(TwigViewFactory $twigViewFactory)
    {
        $this->twigViewFactory = $twigViewFactory;
        return $this;
    }

    protected function twig(string $name)
    {
        return $this->attachView($this->twigViewFactory->load($name));
    }
}
