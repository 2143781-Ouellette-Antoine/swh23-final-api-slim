<?php

namespace App\Domain\Poutine\Service;

use App\Domain\Poutine\Repository\SupprimerPoutineParIdRepository;

/**
 * Service.
 */
final class SupprimerPoutineParIdView
{
    /**
     * @var SupprimerPoutineParIdRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param PoutineRepository $repository
     */
    public function __construct(SupprimerPoutineParIdRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Supprimer la poutine par id.
     *
     * @return array La poutine supprimee
     */
    public function supprimerPoutineParId($poutineId): array
    {

        $poutineSupprimee = $this->repository->deletePoutineById($poutineId);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = $poutineSupprimee;
        return $resultat;
    }

}
