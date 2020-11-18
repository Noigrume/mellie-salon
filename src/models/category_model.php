<?php 

// Inclusion des dépendances
require_once SERVICES_DIR . '/pdo_helpers.php';

/**
 * Fonctions de modèles relatives à la table User
 */

 /**
  * Récupère un enregitrement de la table User à partir d'une adresse email
  */
function getTheByCategory(string $category)
{
    $sql = 'SELECT * 
            FROM the
            WHERE category = ?';

    return fetchAllRows($sql, [ $category ]);
}