<?php

namespace App\Domain\Poutine\Service;

use App\Domain\Poutine\Repository\GenererCleApiRepository;

/**
 * Service.
 */
final class GenererCleApiView
{
    /**
     * @var GenererCleApiRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param GenererCleApiRepository $repository
     */
    public function __construct(GenererCleApiRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Genere une nouvelle cle API pour l'usager avec le mot de passe.
     *
     * @return array La nouvelle cle API
     */
    public function authentificationEtCleApi($codeUsager, $motDePasseInput): array
    {
        // Authentification:
        
        $usager = $this->repository->selectUsager($codeUsager);

        //if code_usager ou mot_de_passe invalide.
        if (empty($usager) || !password_verify($motDePasseInput, $usager["mot_de_passe_hash"]))
            $resultat = [
                "messageErreur" => "Usager ou mot de passe invalide."
            ];
        else
        {
            //Generer une nouvelle cle api.
            $resultat = $this->genererNouvelleCleApi($usager["id"]);
        }

        return $resultat;
    }

    public function genererNouvelleCleApi($idUsager): array
    {
        //Generer une cle aleatoire.
        $nouvelleCleApi = bin2hex(random_bytes(20));//20: nombre caracteres.

        //Updater la cle de l'Usager.
        return $this->repository->updateCleApi($idUsager, $nouvelleCleApi);
    }
}