<?php

namespace App\Models\UsersModels;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM users
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insert(\PDO $connexion, array $data = null ){
    $sql = "INSERT INTO users
            SET name = :pseudo,
                email = :email,
                password = :password,
                biography = :description,
                picture = :picture
                ;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':pseudo', $data['pseudo'], \PDO::PARAM_STR);
    $rs->bindValue(':email', $data['email'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $data['password'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':picture', $_FILES['picture']['name'], \PDO::PARAM_STR);
    $rs->execute();
    return $connexion->lastInsertId();
}