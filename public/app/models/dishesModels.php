<?php

namespace App\Models\DishesModel;

function findAll(\PDO $connexion)
{
    // Requête SQL pour récupérer les recettes avec leurs informations associées
    $sql = "
        SELECT 
            dishes.id,
            dishes.name AS dish_name,
            ROUND(COALESCE(AVG(ratings.value), 0), 2) AS average_rating,
            dishes.description AS description,
            dishes.picture,
            dishes.created_at,
            users.name AS user_name,
            COUNT(comments.id) AS number_of_comments
        FROM dishes
        LEFT JOIN users ON dishes.user_id = users.id
        LEFT JOIN ratings ON dishes.id = ratings.dish_id
        LEFT JOIN comments ON dishes.id = comments.dish_id
        GROUP BY dishes.id
        ORDER BY dishes.created_at DESC
        LIMIT 9;
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->execute();

    // Retourne les résultats sous forme de tableau associatif
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Récupère une recette aléatoire de la table dishes.
 */
function randOneDishes(\PDO $connexion)
{
    // Requête SQL pour récupérer une recette aléatoire avec ses informations associées
    $sql = "
        SELECT 
            dishes.id,
            dishes.name AS dish_name,
            ROUND(COALESCE(AVG(ratings.value), 0), 2) AS average_rating,
            dishes.description AS description,
            dishes.picture,
            users.name AS user_name,
            COUNT(comments.id) AS number_of_comments
        FROM dishes
        LEFT JOIN users ON dishes.user_id = users.id
        LEFT JOIN ratings ON dishes.id = ratings.dish_id
        LEFT JOIN comments ON dishes.id = comments.dish_id
        GROUP BY dishes.id, users.name
        ORDER BY RAND()
        LIMIT 1;
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->execute();

    // Retourne le résultat sous forme de tableau associatif
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

/**
 * Récupère les recettes les plus populaires (en fonction de leur note moyenne).
 */
function findPopularDishes(\PDO $connexion)
{
    // Requête SQL pour récupérer les recettes les mieux notées avec leurs informations associées
    $sql = "
        SELECT 
            dishes.id,
            dishes.name AS dish_name,
            ROUND(COALESCE(AVG(ratings.value), 0), 2) AS average_rating,
            dishes.description AS description,
            dishes.picture,
            users.name AS user_name,
            COUNT(comments.id) AS number_of_comments
        FROM dishes
        LEFT JOIN users ON dishes.user_id = users.id
        LEFT JOIN ratings ON dishes.id = ratings.dish_id
        LEFT JOIN comments ON dishes.id = comments.dish_id
        GROUP BY dishes.id, users.name
        ORDER BY average_rating DESC
        LIMIT 3;
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->execute();

    // Retourne les résultats sous forme de tableau associatif
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Récupère les meilleures recettes d'un utilisateur spécifié par son ID.
 */
function getTopDishesByUserID(\PDO $connexion, $topUser)
{
    // Requête SQL pour récupérer les meilleures recettes d'un utilisateur spécifié
    $sql = "
        SELECT 
            dishes.id,
            dishes.name AS dish_name,
            COALESCE(AVG(ratings.value), 0) AS average_rating,
            dishes.description AS description,
            dishes.picture
        FROM dishes
        LEFT JOIN ratings ON dishes.id = ratings.dish_id
        WHERE dishes.user_id = :userId
        GROUP BY dishes.id
        ORDER BY average_rating DESC
        LIMIT 3
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':userId', $topUser, \PDO::PARAM_INT);
    $rs->execute();

    // Retourne les résultats sous forme de tableau associatif
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllDishesByCategoriesId(\PDO $connexion, $id)
{
    // Requête SQL pour récupérer les recettes par catégories
    $sql = "
        SELECT 
            dishes.id,
            dishes.type_id,
            dishes.name AS dish_name,
            ROUND(COALESCE(AVG(ratings.value), 0), 2) AS average_rating,
            dishes.description AS description,
            dishes.picture,
            dishes.created_at,
            users.name AS user_name,
            COUNT(comments.id) AS number_of_comments
        FROM dishes
        LEFT JOIN users ON dishes.user_id = users.id
        LEFT JOIN ratings ON dishes.id = ratings.dish_id
        LEFT JOIN comments ON dishes.id = comments.dish_id
        JOIN types_of_dishes tod ON dishes.type_id = tod.id
        WHERE tod.id = :id
        GROUP BY dishes.id
        ORDER BY dishes.created_at ASC
        LIMIT 9;
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    // Retourne les résultats sous forme de tableau associatif
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllDishesByUserID(\PDO $connexion, $id)
{
    // Requête SQL pour récupérer les meilleures recettes d'un utilisateur spécifié
    $sql = "
        SELECT 
            dishes.id,
            dishes.name AS dish_name,
            ROUND(COALESCE(AVG(ratings.value), 0), 2) AS average_rating,
            dishes.description AS description,
            dishes.picture,
            dishes.created_at
        FROM dishes
        LEFT JOIN ratings ON dishes.id = ratings.dish_id
        WHERE dishes.user_id = :userId
        GROUP BY dishes.id
        ORDER BY created_at ASC
    ";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':userId', $id, \PDO::PARAM_INT);
    $rs->execute();

    // Retourne les résultats sous forme de tableau associatif
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllDishesByIngredientsId(\PDO $connexion, $id)
{
    // Requête SQL pour récupérer les recettes par catégories
    $sql = "
    SELECT 
        dishes.id,
        dishes.type_id,
        dishes.name AS dish_name,
        ROUND(COALESCE(AVG(ratings.value), 0), 2) AS average_rating,
        dishes.description AS description,
        dishes.picture,
        dishes.created_at,
        users.name AS user_name,
        COUNT(comments.id) AS number_of_comments
    FROM dishes
    LEFT JOIN users ON dishes.user_id = users.id
    LEFT JOIN ratings ON dishes.id = ratings.dish_id
    LEFT JOIN comments ON dishes.id = comments.dish_id
    LEFT JOIN dishes_has_ingredients dhi ON dishes.id = dhi.dish_id
    WHERE dhi.ingredient_id = :id
    GROUP BY dishes.id
    ORDER BY dishes.created_at ASC
    LIMIT 9;
";

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    // Retourne les résultats sous forme de tableau associatif
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findBaseInformations(\PDO $connexion, int $id)
{
    $sql="
        SELECT
        r.name AS nom_recette,
        AVG(ra.value) AS note_moyenne,
        r.prep_time AS duree_preparation,
        r.description AS description_recette,
        r.picture,
        u.name AS nom_auteur,
        COUNT(c.dish_id) AS nombre_commentaires
        FROM
            dishes r
        LEFT JOIN
            ratings ra ON r.id = ra.dish_id
        LEFT JOIN
            users u ON r.user_id = u.id
        LEFT JOIN
            comments c ON r.id = c.dish_id
        WHERE
            r.id = :id;
    ;";

     // Préparation et exécution de la requête
     $rs = $connexion->prepare($sql);
     $rs->bindValue(':id', $id, \PDO::PARAM_INT);
     $rs->execute();
 
     // Retourne les résultats sous forme de tableau associatif
     return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findIngredientsByDishes(\PDO $connexion, int $id)
{
    $sql="
        SELECT
            i.name AS nom_ingredient,
            di.quantity AS quantite,
            i.unit AS unite
        FROM
            dishes_has_ingredients di
        JOIN
            ingredients i ON di.ingredient_id = i.id
        WHERE
            di.dish_id = :id;
    ;";

     // Préparation et exécution de la requête
     $rs = $connexion->prepare($sql);
     $rs->bindValue(':id', $id, \PDO::PARAM_INT);
     $rs->execute();
 
     // Retourne les résultats sous forme de tableau associatif
     return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findCommentariesByDishes(\PDO $connexion, int $id)
{
    $sql="
        SELECT
        u.name AS nom_utilisateur,
        u.picture AS picture,
        c.content AS contenu_commentaire
        FROM
            comments c
        JOIN
            users u ON c.user_id = u.id
        WHERE
            c.dish_id = :id;
    ;";

     // Préparation et exécution de la requête
     $rs = $connexion->prepare($sql);
     $rs->bindValue(':id', $id, \PDO::PARAM_INT);
     $rs->execute();
 
     // Retourne les résultats sous forme de tableau associatif
     return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
