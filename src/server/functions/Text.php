<?php

    class Text {
        
        /**
         * Function to change all spaces from a given text to "plus"
         */
        function formatTextPlus($text) {
            return strtr($text, " ", "+");
        }

        /**
         * Function to change all spaces from a given text to "hyphens"
         */
        function formatTextHyphen($text) {
            return strtr($text, " ", "-");
        }


        /**
         * Function to clear accents
         * 
         * @param String $text
         */
        function clearText(String $text) { 
            $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
            $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
            return str_replace($comAcentos, $semAcentos, $text);
        }


        /**
         * Function to split text and return the first or second half.
         * 
         * @param String $text
         * The given text to split
         * 
         * @param bool $first_half
         * If true, returns the first half of the split 
         */

        function splitText($text, bool $first_half = true) {
            $middle = strrpos(substr($text, 0, floor(strlen($text) / 2)), ' ') + 1;
            $subText = null;

            if($first_half) {
                $subText = substr($text, 0, $middle);
            }
            else {
                $subText = substr($text, $middle);
            }

            return $subText;

        }


    }
?>