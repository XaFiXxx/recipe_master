<?php

namespace App\Models\IngredientsModels;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM ingredients
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertIngredientsByID(\PDO $connexion, array $data){
    $sql = "INSERT INTO dishes_has_ingredients
            SET   dish_id =  :dish,
                  ingredient_id = :ing;         
    ";
     $rs = $connexion->prepare($sql);
     $rs->bindValue(':dish', $data['recetteID'], \PDO::PARAM_INT);
     $rs->bindValue(':ing', $data['ingredientID'], \PDO::PARAM_INT);
     return $rs->execute();
}