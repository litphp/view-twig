<?php

declare(strict_types=1);

namespace Lit\View\Twig;

use Lit\Voltage\Interfaces\ViewInterface;

trait TwigViewBuilderTrait
{
    abstract protected function attachView(ViewInterface $view);
    /**
     * @var TwigViewFactory
     */
    protected $twigViewFactory;

    public function injectTwigViewFactory(TwigViewFactory $twigViewFactory)
    {
        $this->twigViewFactory = $twigViewFactory;
    }

    protected function twig(string $name): TwigView
    {
        return $this->attachView($this->twigViewFactory->load($name));
    }
}
