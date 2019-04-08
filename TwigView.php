<?php

declare(strict_types=1);

namespace Lit\View\Twig;

use Lit\Air\Configurator as C;
use Lit\Voltage\AbstractView;
use Psr\Http\Message\ResponseInterface;
use Twig\Environment;
use Twig\TemplateWrapper;

class TwigView extends AbstractView
{
    /**
     * @var TemplateWrapper
     */
    protected $template;

    public function __construct(TemplateWrapper $template)
    {
        $this->template = $template;
    }

    public static function configuration($loader)
    {
        return [
            Environment::class => C::provideParameter([
                C::alias(Environment::class, 'loader'),
                C::alias(Environment::class, 'options'),
            ]),
            C::join(Environment::class, 'loader') => $loader,
        ];
    }

    public function render(array $data = []): ResponseInterface
    {
        $body = $this->getEmptyBody();
        $body->write($this->template->render($data));

        return $this->response;
    }
}