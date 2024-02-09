<?php
function deleteSpecialChar($str) {
      
    // remplacer tous les caractères spéciaux par une chaîne vide
    $res = str_replace( array( '%', '@', '\'', ';', '<', '>' ), ' ', $str);
      
    return $res;
}
  
// Exemple d'une chaîne de caractères 
$str = "A % B @ C <D>'E;"; 
  
// Appeler la fonction
$res = deleteSpecialChar($str); 
  
// Afficher le résultat
echo $res; 
?>