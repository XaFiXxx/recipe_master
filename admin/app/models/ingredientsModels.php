<?php

namespace App\Models\IngredientsModels;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT * /*, dhi.quantity */
            FROM ingredients i
           /* LEFT JOIN dishes_has_ingredients dhi ON i.id = dhi.ingredient_id */
            ORDER BY i.name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findIngredientsByDishId(\PDO $connexion, int $id) : array {
    $sql = "SELECT ingredient_id, 
                    quantity AS quant
            FROM dishes_has_ingredients
            WHERE dish_id = :dishID
    ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':dishID', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertIngredientsByID(\PDO $connexion, array $data){
    $sql = "INSERT INTO dishes_has_ingredients
            SET   dish_id =  :dish,
                  ingredient_id = :ing,
                  quantity = :quantity;         
    ";
     $rs = $connexion->prepare($sql);
     $rs->bindValue(':dish', $data['recetteID'], \PDO::PARAM_INT);
     $rs->bindValue(':ing', $data['ingredientID'], \PDO::PARAM_INT);
     $rs->bindValue(':quantity', $data['quantity'], \PDO::PARAM_INT);
     return $rs->execute();
}

function deleteIngredientsHasDish(\PDO $connexion, int $id) {
    $sql = "DELETE  FROM  dishes_has_ingredients
                    WHERE dish_id = :recetteID
    ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':recetteID', $id, \PDO::PARAM_INT);
    return $rs->execute();
}