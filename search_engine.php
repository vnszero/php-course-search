<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use Symfony\Component\DomCrawler\Crawler;
    use Alura\Engine\Engine;

    $client = new Client(['base_uri' => 'https://www.alura.com.br/']);
    $crawler = new Crawler();

    $searcher = new Engine($client, $crawler);
    $courses = $searcher->search('/cursos-online-programacao/php');

    foreach ($courses as $course)
    {
        Formats::method();
        show_message($course);
        FormatsAlternative::method();
    }

?>