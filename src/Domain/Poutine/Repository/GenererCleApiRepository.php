<?php

namespace App\Domain\Poutine\Repository;

use PDO;

/**
 * Repository.
 */
class GenererCleApiRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Genere une nouvelle cle API selon l'usager et le mot de passe.
     * 
     * @return array La nouvelle cle API
     */
    public function selectUsager($codeUsager): array
    {
        //requete
        $sql = "SELECT id, code_usager, mot_de_passe_hash FROM utilisateur WHERE code_usager=?;";
        //prepare
        $query = $this->connection->prepare($sql);
        //bind
        $query->bindParam(1, $codeUsager, PDO::PARAM_STR);
        //execute
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result==false)
                $result = [];

        return $result;
    }

    public function updateCleApi($idUsager, $cleApi): array
    {
        //Formatter le tableau_associatif_input, pour ne pas qu'il manque de colonne.
        //Ajouter le id du Poutine a Update aussi.
        $paramsSQL = [
            "id" => $idUsager,
            "cle_api" => $cleApi
        ];

        //requete
        $sql = "UPDATE utilisateur
            SET cle_api=:cle_api
            WHERE id=:id;";

        //Prepare
        $query = $this->connection->prepare($sql);
        //Execute & Bind
        $query->execute($paramsSQL);

        //return the json of the cle api.
        $result = [
            "cle_api" => $cleApi
        ];
        return $result;
    }
}