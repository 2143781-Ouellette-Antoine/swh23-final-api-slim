<?php

namespace App\Domain\Poutine\Service;

use App\Domain\Poutine\Repository\ModifierPoutineParIdRepository;

/**
 * Service.
 */
final class ModifierPoutineParIdView
{
    /**
     * @var ModifierPoutineParIdRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param ModifierPoutineParIdRepository $repository
     */
    public function __construct(ModifierPoutineParIdRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Modifier la poutine avec le id.
     *
     * @return array
     */
    public function modifierPoutine($poutineId, array $jsonInput): array
    {

        $poutine = $this->repository->updatePoutine($poutineId, $jsonInput);

        $resultat = $poutine;
        return $resultat;
    }


}
