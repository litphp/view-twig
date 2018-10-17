<?php

declare(strict_types=1);

namespace Lit\View\Twig;

use Lit\Air\Configurator as C;
use Lit\Core\AbstractView;
use Psr\Http\Message\ResponseInterface;

class TwigView extends AbstractView
{
    /**
     * @var \Twig_TemplateWrapper
     */
    protected $template;

    public function __construct(\Twig_TemplateWrapper $template)
    {
        $this->template = $template;
    }

    public static function configuration($loader)
    {
        return [
            \Twig_Environment::class => C::provideParameter([
                C::alias(\Twig_Environment::class, 'loader'),
                C::alias(\Twig_Environment::class, 'options'),
            ]),
            C::join(\Twig_Environment::class, 'loader') => $loader,
        ];
    }

    public function render(array $data = []): ResponseInterface
    {
        $body = $this->getEmptyBody();
        $body->write($this->template->render($data));

        return $this->response;
    }
}