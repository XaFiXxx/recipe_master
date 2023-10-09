<?php

namespace App\Models\RecettesModels;


function findAll(\PDO $connexion): array
{
    $sql = "SELECT *, 
                    d.id AS recID,
                    tod.name AS catName,
                    us.name AS userName,
                    d.name AS recName,
                    d.description AS recDescription,
                    d.picture AS recPicture
            FROM dishes d
            JOIN users us ON d.user_id = us.id
            JOIN types_of_dishes tod ON d.type_id = tod.id
            GROUP BY d.id
            ORDER BY d.created_at DESC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion,int $id): array
{
    $sql = "SELECT *, 
                    d.id AS recID,
                    us.id AS userID,
                    tod.id AS todID,
                    tod.name AS catName,
                    us.name AS userName,
                    d.name AS recName,
                    d.description AS recDescription,
                    d.picture AS recPicture
            FROM dishes d
            JOIN users us ON d.user_id = us.id
            JOIN types_of_dishes tod ON d.type_id = tod.id
            WHERE d.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function insert(\PDO $connexion,) :int {
    $sql = "INSERT INTO dishes
            SET name = :name,
                description = :description,
                prep_time = :prep_time,
                portions = :portions,
                picture = :picture,
                user_id = :userId,
                type_id = :typeId;
    ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $_POST['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $_POST['description'], \PDO::PARAM_STR);
    $rs->bindValue(':prep_time', $_POST['prep_time'], \PDO::PARAM_STR);
    $rs->bindValue(':portions', $_POST['portions'], \PDO::PARAM_INT);
    $rs->bindValue(':picture', $_FILES['picture']['name'], \PDO::PARAM_STR);
    $rs->bindValue(':userId', $_POST['userId'], \PDO::PARAM_INT);
    $rs->bindValue(':typeId', $_POST['typeId'], \PDO::PARAM_INT);
    $rs->execute();
    return $connexion->lastInsertId();
}

function delete(\PDO $connexion, int $id) {
    $sql = "DELETE  FROM  dishes
                    WHERE id = :id
    ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}

function update(\PDO $connexion, int $id, array $data = null) :bool {
    $sql = "    UPDATE  dishes
                SET name = :name,
                    description = :description,
                    prep_time = :prep_time,
                    portions = :portions,
                    picture = :picture,
                    user_id = :userId,
                    type_id = :typeId
                WHERE id = :id
    ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $_POST['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $_POST['description'], \PDO::PARAM_STR);
    $rs->bindValue(':prep_time', $_POST['prep_time'], \PDO::PARAM_STR);
    $rs->bindValue(':portions', $_POST['portions'], \PDO::PARAM_INT);
    $rs->bindValue(':picture', $_FILES['picture']['name'], \PDO::PARAM_STR);
    $rs->bindValue(':userId', $_POST['userId'], \PDO::PARAM_INT);
    $rs->bindValue(':typeId', $_POST['typeId'], \PDO::PARAM_INT);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}