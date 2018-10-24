<?php

namespace Abstraction\Infrastructure;

use Abstraction\Domain\Collection;
use Abstraction\Domain\Storage;
use Abstraction\Infrastructure\Formatter\JsonFormatter;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;

class DoctrineStorage implements Storage
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function all(): Collection
    {
        $query = $this->entityManager->getConnection()->prepare("SELECT postalCode FROM customers");
        $query->execute();

        $postalCodes = $this->clearAlphabeticChar($query->fetchAll());
        $postalCodesCleaner = $this->clearEmptyItem($postalCodes);

        return new Collection($postalCodesCleaner);
    }

    private function clearEmptyItem(array $postalCodes): array
    {
        return array_filter($postalCodes, function ($item) {
            return !empty($item);
        });
    }

    private function clearAlphabeticChar(array $postalCodes): array
    {
        return array_map(function ($item) {
            return (int)preg_replace("/[A-Z-]/", "", $item['postalCode']);
        }, $postalCodes);
    }
}
