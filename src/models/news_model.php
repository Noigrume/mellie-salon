<?php

// Inclusion des dépendances
require_once SERVICES_DIR . '/pdo_helpers.php';

/**
 * Fonctions de modèles relatives à la table Post
 */

/**
 * Récupère tous les articles
 */
function getAllPosts(): array 
{
    $sql = ' SELECT*
            FROM news 
            JOIN category 
            ORDER BY createdAt DESC';

    // Récupération des résultats
    return fetchAllRows($sql);
}

/**
 * Récupère 1 article
 */
function getOnePost(int $postId): array
{
    // récupérer les données de l'article
    $sql = 'SELECT P.id AS postid, title, content, P.createdAt AS postCreatedAt, firstname, lastname, image, C.name AS category
            FROM post AS P
            INNER JOIN user AS U ON P.userId = U.id
            INNER JOIN category AS C ON P.categoryId = C.id
            WHERE P.id = ?';

    // Récupération des résultats
    return fetchOneRow($sql, [$postId]);
}


function insertPost(string $title, string $content, int $categoryId, string $image, int $userId): ?int
{
    $sql = 'INSERT INTO post
            (title, content, image, categoryId, userId, createdAt)
            VALUES (?, ?, ?, ?, ?, NOW())';

    return insertQuery($sql, [$title, $content, $image, $categoryId, $userId]);
}