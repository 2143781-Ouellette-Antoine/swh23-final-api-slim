<?php

namespace App\Domain\Poutine\Service;

use App\Domain\Poutine\Repository\AjouterPoutineRepository;

/**
 * Service.
 */
final class AjouterPoutineView
{
    /**
     * @var AjouterPoutineRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param AjouterPoutineRepository $repository
     */
    public function __construct(AjouterPoutineRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Ajoute une poutine.
     *
     * @return $resultat La poutine ajoutee
     */
    public function ajouterPoutine(array $jsonInput): array
    {

        $poutine = $this->repository->insertPoutine($jsonInput);

        $resultat = $poutine;
        return $resultat;
    }


}
