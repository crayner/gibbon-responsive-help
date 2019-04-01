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

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HelpController
 * @package App\Controller
 */
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
     * @param string $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/Download/{name}/", name="download")
     */
    public function download(string $name = 'Gibbon-Mobile.0.0.06.zip')
    {
        $fileSystem = new Filesystem();

        $documentation = realpath(__DIR__ . '/../../Resources/Download');
        $path = $documentation . DIRECTORY_SEPARATOR . $name ;

        if ($fileSystem->exists($path)) {
            $file = new File($path);
            $response = new Response(file_get_contents($path));
            $response->headers->set('Content-Type', $file->getMimeType());
            $response->headers->set('Content-Disposition', 'attachment;filename="' . $file->getBasename(). '"');
            $response->headers->set('Content-length', $file->getSize());

            return $response;
        }

        return $this->forward(HelpController::class. '::notFound',
            [
                'scope' => 'Document',
                'name' => $name,
            ]
        );
    }

    /**
     * @param MarkdownParserInterface $parser
     * @param string $scope
     * @param string $name
     * @return Response
     * @Route("/404/{scope}/{name}/", name="404_error")
     */
    public function notFound(MarkdownParserInterface $parser, string $scope, string $name)
    {
        $path = realpath(__DIR__ . '/../../Resources/System/404.md');

        $page = file_get_contents($path);

        $page = str_replace('{{404}}', $scope . '/' . $name, $page);

        $content = $this->replace($parser->transformMarkdown($page), $scope, $name);

        return $this->render('base.html.twig',
            [
                'content' => $content,
            ]
        );
    }


    /**
     * @param MarkdownParserInterface $parser
     * @param string $scope
     * @param string $name
     * @Route("/{scope}/{name}/", name="help")
     */
    public function help(MarkdownParserInterface $parser, string $scope = 'Start', string $name = 'Installation')
    {
        $fileSystem = new Filesystem();

        $documentation = realpath(__DIR__ . '/../../Resources/');

        $path = $documentation . DIRECTORY_SEPARATOR . $scope . DIRECTORY_SEPARATOR . $name . '.md';

        if (! $fileSystem->exists($path))
            return $this->forward(HelpController::class. '::notFound',
                [
                    'scope' => $scope,
                    'name' => $name,
                ]
            );

        $page = file_get_contents($path);

        $content = $this->replace($parser->transformMarkdown($page), $scope, $name);

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

        return $content;
    }
}