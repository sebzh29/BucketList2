<?php

namespace App\Helper;

class CensuratorService
{
    private $offensiveWords = array("merde", "fuck", "kahoot"); // Liste des mots offensants


//    public function purify($string) {
//        $words = explode(" ", $string); // Sépare le texte en mots
//        foreach ($words as &$word) {
//            if (in_array(strtolower($word), $this->offensiveWords)) {
//                $word = str_repeat("*", strlen($word)); // Remplace le mot par des astérisques de la même longueur
//            }
//        }
//        return implode(" ", $words); // Reconstruit le texte avec les mots censurés
//    }
    public function purify($string) {
        foreach ($this->offensiveWords as $word) {
            $string = str_ireplace($word,"*", $string);
        }
        return $string;
    }

}

