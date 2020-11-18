<?php



namespace App\Models;

use App\Core\Model;

class GameModel extends Model
{

    function getAllGames(): array
    {
        $sql = 'SELECT *
FROM jeux
JOIN player
ON jeux.playerId = player.id_player
/*JOIN duration
ON jeux.timeId = duration.id_time

JOIN difficulty
ON jeux.difficultyId = difficulty.id_difficulty */
ORDER BY name
';

        return self::$database->fetchAllRows($sql);
    }

    function insertGame(string $title, int $extensionId , int $playerId, int $max_playerId, int $timeId, int $difficultyId, int $max_difficultyId, int $age): ?int
    {
        $sql = 'INSERT INTO jeux
            (name, extensionId , playerId, max_playerId, timeId, difficultyId, max_difficultyId, age)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

        return self::$database->insertQuery($sql, [$title, $extensionId , $playerId, $max_playerId, $timeId, $difficultyId, $max_difficultyId, $age]);
    }

    function deleteGame(int $postId)
    {
        $sql = 'DELETE FROM the WHERE teaid = ?';

        self::$database->executeQuery($sql, [$postId]);
    }
}
