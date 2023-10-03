<?php

namespace App\Models\CategoriesModels;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM types_of_dishes
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, $id)
{
    $sql =  "SELECT *
            FROM types_of_dishes
            WHERE id = :id
    ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function insert(\PDO $connexion, ){
    $sql = "INSERT INTO types_of_dishes
            SET name = :name,
                description = :description;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $_POST['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $_POST['description'], \PDO::PARAM_STR);
    $rs->execute();
    return $connexion->lastInsertId();
}

function delete(\PDO $connexion, int $id){
    $sql = "DELETE FROM types_of_dishes
            WHERE id = :id;";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}

function update(\PDO $connexion, int $id){
    $sql = "UPDATE types_of_dishes
            SET name = :name,
                description = :description
            WHERE id = :id";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $_POST['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $_POST['description'], \PDO::PARAM_STR);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return intval($rs->execute()); 
}