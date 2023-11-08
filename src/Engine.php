<?php
namespace Alura\Engine;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Engine
{
    /*
     * @var ClientInterface
     */
    private $client;

    /*
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $client, Crawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }
    public function search(string $url): array
    {
        $answer = $this->client->request('GET', $url);
        $html = $answer->getBody();
        $this->crawler->addHtmlContent($html);

        $elements = $this->crawler->filter(selector: 'span.card-curso__nome');
        $courses = [];

        foreach ($elements as $element)
        {
            $courses[] = $element->textContent;
        }
        return $courses;
    }
}

?>