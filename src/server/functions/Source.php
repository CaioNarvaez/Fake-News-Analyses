<?php 

include("./Text.php");

    class Source {

        public $url;

        public $searchFor;

        public $getElement;

        public $whatExplode;

        public $subExplode;

        public $article;



        function __construct($sourcename, $text) {

            $txtFunctions = new Text();

            if($sourcename == "G1") {
                $this->url = "https://g1.globo.com/busca/?q=";
                $this->searchFor = $txtFunctions->formatTextPlus($text);
                $this->getElement = "content";
                $this->whatExplode = "G1";
                $this->subExplode = "...";
            }

          }

        
          /**
           * function to store in an array all the values about the given text.
           * 
           * @param $content
           * The entire response from Dom to explode and returns the text with accents.
           * 
           * @param $clean_content
           * The entire response from Dom to explode and returns the text without accents.
           * 
           * @param $clean_text 
           * The given text without accents.
           * 
           */
          
          public function getArticle($content, $clean_content, $clean_text) {

            $article = null;
        
            if (stripos($clean_content, $clean_text)) {
                $dirt_array = explode($this->whatExplode, $content);
                $clean_array = explode($this->whatExplode, $clean_content);
            
                for ($i = 0; $i < count($clean_array); $i++) {
                    if(stripos($clean_array[$i], $clean_text)) {
                        $article = $dirt_array[$i];
                        break; 
                    }
                }
            }
        
            return $article;
        }

    }

?>