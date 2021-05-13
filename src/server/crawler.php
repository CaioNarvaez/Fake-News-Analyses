<?php

use Functions\Source;
use Functions\Text;

require_once realpath("../../vendor/autoload.php");

function crawl_page($source = "CNNUSA", $text)
{
    $txtFunctions = new Text();
    $sourceObj = new Source($source, $text);
    $dom = new DOMDocument('1.0');
    
    $url = $sourceObj->url.$sourceObj->searchFor;

    @$dom->loadHTMLFile($url);

    $xpath = new DomXPath($dom);

    $anchors = $dom->getElementById($sourceObj->getElement);
    
    $content = $anchors->textContent;



    $clean_content = $txtFunctions->clearText($content);
    $clean_text = $txtFunctions->clearText($text);

    $article = $sourceObj->getArticle($content, $clean_content, $clean_text);

    if($article === null) {
        $text_first_half = $txtFunctions->splitText($clean_text);

        $article = $sourceObj->getArticle($content, $clean_content, $text_first_half);

        if($article === null) {
            $text_second_half = $txtFunctions->splitText($clean_text, false);
            $article = $sourceObj->getArticle($content, $clean_content, $text_second_half);
        }
    }
  
    if($article !== null) {
        $article_content = explode($sourceObj->subExplode, $article);
        $sourceObj->article = $article_content;
    }
    
    $nodeList = $xpath->query("//a/@href");

    $sourceObj->getLink($nodeList, $text);


    $link = "https:".$sourceObj->link;  
    $sourceObj->link = $link;


    //echo $sourceObj->link;

    //echo json_encode($sourceObj, JSON_UNESCAPED_UNICODE);
    
}

    $text = "CPI da Covid: representante da Pfizer depõe hoje";
    crawl_page("G1", $text);
?>