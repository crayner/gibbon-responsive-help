<?php
/**
 * Created by PhpStorm.
 *
 * gibbon-mobile-help
 * (c) 2018 Craig Rayner <craig@craigrayner.com>
 *
 * User: craig
 * Date: 17/12/2018
 * Time: 17:52
 */
namespace App\Controller;

use App\Repository\GibbonHelpRepository;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelpController extends AbstractController
{
    /**
     * @param MarkdownParserInterface $parser
     * @param string $scope
     * @param string $name
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->redirectToRoute('help', ['scope' => 'Start', 'name' => 'Installation']);
    }

    /**
     * @param MarkdownParserInterface $parser
     * @param string $scope
     * @param string $name
     * @Route("/{scope}/{name}/", name="help")
     */
    public function help(MarkdownParserInterface $parser, GibbonHelpRepository $repository, string $scope = 'Start', string $name = 'Installation')
    {
        $page = $repository->findOneBy(['scope' => $scope, 'name' => $name]);

        if (!$page)
            $page = $repository->findOneBy(['scope' => 'System', 'name' => '404']);

        $content = $this->replace($parser->transformMarkdown($page->getContent()), $scope, $name);

        return $this->render('base.html.twig',
            [
                'content' => $content,
            ]
        );
    }

    /**
     * @param string $content
     * @param string $scope
     * @param string $name
     * @return mixed|string
     */
    public function replace(string $content, string $scope, string $name)
    {
        $content = str_replace('<ul>', '<div class="row"><div class="col-12"><ul class="list-group list-group-flush">', $content);
        $content = str_replace('<ol>', '<div class="row"><div class="col-12"><ol class="list-group list-group-flush">', $content);
        $content = str_replace('<li>', '<li class="list-group-item">', $content);
        $content = str_replace('<table>', '<table class="table table-dark">', $content);
        $content = str_replace('<p>', '<div class="row"><div class="col-12"><p>', $content);
        $content = str_replace('</p>', '</p></div></div>', $content);
        $content = str_replace('<h1>', '<div class="row"><div class="col-12"><h1>', $content);
        $content = str_replace('</h1>', '</h1></div></div>', $content);
        $content = str_replace('<h2>', '<div class="row"><div class="col-12"><h2>', $content);
        $content = str_replace('</h2>', '</h2></div></div>', $content);
        $content = str_replace('<h3>', '<div class="row"><div class="col-12"><h3>', $content);
        $content = str_replace('</h3>', '</h3></div></div>', $content);
        $content = str_replace('<h4>', '<div class="row"><div class="col-12"><h4>', $content);
        $content = str_replace('</h4>', '</h4></div></div>', $content);
        $content = str_replace('</ul>', '</ul></div></div>', $content);
        $content = str_replace('</ol>', '</ol></div></div>', $content);
        $content = str_replace('<a href="http', '<a target="_blank" href="http', $content);
        $content = str_replace('404', $scope.':'.$name, $content);

        return $content;
    }
}