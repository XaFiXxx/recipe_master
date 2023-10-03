<?php

namespace App\Models\RecettesModels;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *, 
                    tod.name AS catName,
                    us.name AS userName,
                    d.name AS recName,
                    d.description AS recDescription,
                    d.picture AS recPicture
            FROM dishes d
            JOIN users us ON d.user_id = us.id
            JOIN types_of_dishes tod ON d.type_id = tod.id
            GROUP BY d.id
            ORDER BY d.created_at ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}