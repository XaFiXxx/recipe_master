<?php

namespace App\Models\UsersModel;

/**
 * Récupère l'utilisateur ayant les recettes les mieux notées.
 *
 * Cette fonction retourne l'utilisateur qui a les meilleures notes moyennes pour ses recettes.
 * Elle prend en compte toutes les notes attribuées à toutes les recettes de l'utilisateur.
 */
function getTopUser(\PDO $connexion)
{
    // Requête SQL pour récupérer l'utilisateur ayant les recettes les mieux notées
    // ainsi que le nombre total de recettes qu'il a postées.
    $sql = "
        SELECT 
            users.id AS user_id,
            users.name AS user_name,
            users.picture AS user_picture,
            DATE(users.created_at) AS user_registration_date,
            COUNT(DISTINCT dishes.id) AS total_recipes
        FROM users
        LEFT JOIN dishes ON users.id = dishes.user_id
        LEFT JOIN ratings ON dishes.id = ratings.dish_id
        GROUP BY users.id
        ORDER BY COALESCE(AVG(ratings.value), 0) DESC
        LIMIT 1
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->execute();

    // Retourne le résultat sous forme de tableau associatif
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion)
{
    // Requête SQL pour récupérer tous les l'utilisateurs.
    $sql = "
            SELECT 
            users.id AS user_id,
            users.name AS user_name,
            users.picture AS user_picture,
            users.biography AS user_biography,
            COUNT(DISTINCT dishes.id) AS total_recipes
        FROM users
        LEFT JOIN dishes ON users.id = dishes.user_id
        GROUP BY users.id 
        ORDER BY user_name ASC
        LIMIT 9;      
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->execute();

    // Retourne le résultat sous forme de tableau associatif
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, $id)
{
    // Requête SQL pour récupérer un utilisateur par son ID
    $sql = "
        SELECT 
            users.id AS user_id,
            users.name AS user_name,
            users.picture AS user_picture,
            users.biography AS user_biography,
            COUNT(DISTINCT dishes.id) AS total_recipes
        FROM users
        LEFT JOIN dishes ON users.id = dishes.user_id
        WHERE users.id = :userId
        LIMIT 1;      
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':userId', $id, \PDO::PARAM_INT);
    $rs->execute();

    // Retourne le résultat sous forme de tableau associatif
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

