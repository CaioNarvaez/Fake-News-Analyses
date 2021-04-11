<?php

include('functions/Text.php');
include('functions/Source.php');

function crawl_page($source = "G1", $depth = 5, $text)
{
    $txtFunctions = new Text();
    $sourceObj = new Source($source, $text);
    
    $url = $sourceObj->url.$sourceObj->searchFor;

    static $seen = array();
    if (isset($seen[$url]) || $depth === 0) {
        return;
    }

    $seen[$url] = true;

    $dom = new DOMDocument('1.0');
    @$dom->loadHTMLFile($url);

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
    }
    

    $xpath = new DomXPath($dom);
    $nodeList = $xpath->query("//a/@href");

    $link_first_half = $txtFunctions->splitText($clean_text);

    $link_text = $txtFunctions->formatTextHyphen($clean_text);
    $link_first_half = $txtFunctions->formatTextHyphen($link_first_half);
    $link = null;

    // To access the values inside nodes
        foreach($nodeList as $node){
            if(stripos($node->nodeValue, $link_text) || stripos($node->nodeValue, $link_first_half)) {
                $link = $node->nodeValue;
                break;
            }
        }

    //echo $link;

    $link = "https:".$link;    
}

    $text = "gilmar deve indeferir recurso que contesta proibição de cultos e levar caso ao plenário";
    crawl_page("G1", 2, $text);
?>