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

    $sumPairNumberGreaterThatThousandsUseCase = new \Abstraction\Application\SumPairNumberGreaterThatThousandsUseCase(
        $storage,
        $sumPairNumberGreteThatThousands
    );

    $sumPairNumberController = new \Abstraction\Infrastructure\Http\SumPairNumberController(
        $sumPairNumberGreaterThatThousandsUseCase
    );

    echo $sumPairNumberController->index();
});

$app->get('/abstract/db', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Implement '/' route");

    $storage                         = new \Abstraction\Infrastructure\DoctrineStorage($this->entityManager);
    $sumPairNumberGreteThatThousands = new \Abstraction\Domain\SumPairNumberGreteThatThousandsService();

    $sumPairNumberGreaterThatThousandsUseCase = new \Abstraction\Application\SumPairNumberGreaterThatThousandsUseCase(
        $storage,
        $sumPairNumberGreteThatThousands
    );

    $sumPairNumberController = new \Abstraction\Infrastructure\Http\SumPairNumberController(
        $sumPairNumberGreaterThatThousandsUseCase
    );

    echo $sumPairNumberController->index();
});

$app->get('/implement/db', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Implement '/' route");

    echo (new \Implement\Query())->execute();
});

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
