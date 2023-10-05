<?php

namespace core\tools;

function slugify($str, $delimiter = '-')
{
    // Étape 1 : Conversion des caractères spéciaux
    $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

    // Étape 2 : Suppression des apostrophes
    $str = str_replace("'", "", $str);

    // Étape 3 : Remplacement des "&"
    $str = str_replace("&", "and", $str);

    // Étape 4 et 5 : Remplacement et suppression des caractères
    $patterns = [
        '/[^A-Za-z0-9-]+/',  // Caractères non alphanumériques
        '/[\s-]+/'           // Espaces et tirets multiples
    ];
    foreach ($patterns as $pattern) {
        $str = preg_replace($pattern, $delimiter, $str);
    }

    // Étape 6 : Suppression des espaces blancs et conversion en minuscules
    $str = strtolower(trim($str, $delimiter));

    return $str;
}

function uploadImage($nomImage, $nomImageTemp) {
    // On détermine un répertoire où télécharger l'image (chemin relatif)
    $dossierUpload = "../../public/www/pictures/";
    
    // Vérifiez si le répertoire de destination existe, sinon, créez-le
    if (!file_exists($dossierUpload)) {
        mkdir($dossierUpload, 0755, true); // Créez le répertoire avec les autorisations appropriées
    }
    
    // Maintenant, effectuez le téléchargement en utilisant PHP
    move_uploaded_file($nomImageTemp, $dossierUpload . $nomImage);
    
    // Vous pouvez ajouter d'autres logiques ici si nécessaire
}

function truncate($string, $letter_limit)
{
    // Vérifiez d'abord si la longueur de la chaîne est inférieure ou égale à la limite
    if (mb_strlen($string) <= $letter_limit) {
        return $string;
    }

    // Tronquez la chaîne pour qu'elle ait au plus la longueur spécifiée
    $truncated_string = mb_substr($string, 0, $letter_limit);

    // Recherchez l'index du dernier espace dans la chaîne tronquée
    $last_space_index = mb_strrpos($truncated_string, ' ');

    // Si un espace a été trouvé, tronquez la chaîne au dernier espace
    if ($last_space_index !== false) {
        $truncated_string = mb_substr($truncated_string, 0, $last_space_index);
    }

    // Ajoutez des points de suspension à la fin
    $truncated_string .= ' ...';

    return $truncated_string;
}

?>