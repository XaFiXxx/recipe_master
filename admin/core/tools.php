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
    $dossierUpload = "../../public/www/images/";
    
    // Vérifiez si le répertoire de destination existe, sinon, créez-le
    if (!file_exists($dossierUpload)) {
        mkdir($dossierUpload, 0755, true); // Créez le répertoire avec les autorisations appropriées
    }
    
    // Maintenant, effectuez le téléchargement en utilisant PHP
    move_uploaded_file($nomImageTemp, $dossierUpload . $nomImage);
    
    // Vous pouvez ajouter d'autres logiques ici si nécessaire
}

?>