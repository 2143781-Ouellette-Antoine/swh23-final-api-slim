<?php

namespace App\Domain\Poutine\Service;

use App\Domain\Poutine\Repository\PoutineParIdRepository;

/**
 * Service.
 */
final class PoutineParIdView
{
    /**
     * @var PoutineParIdRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param PoutineRepository $repository
     */
    public function __construct(PoutineParIdRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 
     *
     * @return array La poutine selon le id
     */
    public function viewPoutineById($poutineId): array
    {

        $poutine = $this->repository->selectPoutineById($poutineId);

        $resultat = $poutine;
        return $resultat;
    }

}