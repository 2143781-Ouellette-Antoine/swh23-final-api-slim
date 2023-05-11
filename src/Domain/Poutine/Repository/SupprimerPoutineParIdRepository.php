<?php

namespace App\Domain\Poutine\Repository;

use App\Domain\Poutine\Repository\PoutineParIdRepository;//Pour pouvoir caller selectPoutineById($poutineId)
use PDO;

use function PHPUnit\Framework\isNull;

/**
 * Repository.
 */
class SupprimerPoutineParIdRepository
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
     * Delete la poutine avec le id.
     * 
     * @return DataResponse
     */
    public function deletePoutineById($poutineId): array
    {
        //Sanity check.
        $poutineSupprimee = (new PoutineParIdRepository($this->connection))->selectPoutineById($poutineId);
        if(is_null($poutineSupprimee["id"]))
            return ["succes" => false];

        //requete
        $sql = "DELETE FROM poutine WHERE id=?;";
        //prepare
        $query = $this->connection->prepare($sql);
        //bind
        $id = intval($poutineId);
        $query->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $succesSQL = $query->execute();

        $result = [
            "succes" => $succesSQL,
            "id" => $poutineSupprimee["id"],
            "nom" => $poutineSupprimee["nom"],
            "description" => $poutineSupprimee["description"]
        ];
        return $result;
    }
}