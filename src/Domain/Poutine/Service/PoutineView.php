<?php

namespace App\Domain\Poutine\Service;

use App\Domain\Poutine\Repository\PoutineRepository;

/**
 * Service.
 */
final class PoutineView
{
    /**
     * @var PoutineRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param PoutineRepository $repository
     */
    public function __construct(PoutineRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Sélectionne toutes les poutines.
     *
     * @return array La liste des poutines
     */
    public function viewAllPoutines(): array
    {

        $poutines = $this->repository->selectAllPoutines();

        // Tableau qui contient la réponse à retourner
        $resultat = [
            "poutines" => $poutines
        ];

        return $resultat;
    }


}
