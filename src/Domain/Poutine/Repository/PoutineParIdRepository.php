<?php

namespace App\Domain\Poutine\Repository;

use PDO;

/**
 * Repository.
 */
class PoutineParIdRepository
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
     * Sélectionne la poutine selon le id.
     * 
     * @return array La poutine selon le id
     */
    public function selectPoutineById($poutineId): array
    {
        //requete
        $sql = "SELECT * FROM poutine WHERE id=?;";
        //prepare
        $query = $this->connection->prepare($sql);
        //bind
        $id = intval($poutineId);
        $query->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result==false)
            	$result = [];

        return $result;
    }
}