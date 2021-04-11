<?php 

include("./Text.php");

    class Source {

        public $id;

        public $name;

        public $url;

        public $searchFor;

        public $getElement;

        public $whatExplode;

        public $subExplode;

        public $article;

        public $link;



        /**
         * 
         * @todo create database and store all sources datas which will be loaded when call this constructor.
         */

        function __construct($sourcename, $text) {

            $txtFunctions = new Text();

            if($sourcename == "G1") {
                $this->id = 1;
                $this->name = "G1";
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

        /**
         * function to get the article's link looping through the nodeList from htmlContent
         * 
         * @param $nodeList
         * List of links attached to all hrefs on the page.
         * 
         * @param $clean_text
         * The given text without accents
         */

        function getLink($nodeList, $clean_text) : void {
            $txtFunctions = new Text();
            $link = null;

            $link_first_half = $txtFunctions->splitText($clean_text);
            $link_second_half = $txtFunctions->splitText($clean_text, false);

            if($this->id === 1) {
                $link_text = $txtFunctions->formatTextHyphen($clean_text);
                $link_first_half = $txtFunctions->formatTextHyphen($link_first_half);
            }

            
            // To access the values inside nodes
            foreach($nodeList as $node){
                if(stripos($node->nodeValue, $link_text) || stripos($node->nodeValue, $link_first_half)) {
                    $link = $node->nodeValue;
                    break;
                }
                elseif(stripos($node->nodeValue, $link_second_half)) {
                    $link = $node->nodeValue;
                    break;
                }
            }

            $this->link = $link;
        
        }

    }

?>