<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/implement', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Implement '/' route");

    // Render index view
    echo (new Implement\App())->execute();
});

$app->get('/abstract', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Implement '/' route");

    $formatter                       = new \Abstraction\Infrastructure\Formatter\JsonFormatter();
    $storage                         = new \Abstraction\Infrastructure\FileStorage($formatter, 'data.json');
    $sumPairNumberGreteThatThousands = new \Abstraction\Domain\SumPairNumberGreteThatThousandsService();

    $sut = new \Abstraction\Application\SumPairNumberGreaterThatThousandsUseCase($storage, $sumPairNumberGreteThatThousands);

    echo $sut->execute();
});

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
