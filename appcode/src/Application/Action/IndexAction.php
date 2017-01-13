<?php // src/App/Action/IndexAction.php

namespace Application\Action;

use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class IndexAction
{
    private $em;

    private $template;

    public function __construct(EntityManager $em, TemplateRendererInterface $template)
    {
        $this->em = $em;
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        #$userRepository = $this->em->getRepository('Application\Domain\User\User');
        #$users = $userRepository->findAll();

        return new HtmlResponse($this->template->render('app::index'));
    }
}