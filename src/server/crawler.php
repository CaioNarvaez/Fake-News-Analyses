<?php

include('functions/Text.php');
include('functions/Source.php');

function crawl_page($source = "G1", $text)
{
    $txtFunctions = new Text();
    $sourceObj = new Source($source, $text);
    $dom = new DOMDocument('1.0');
    $xpath = new DomXPath($dom);
    
    $url = $sourceObj->url.$sourceObj->searchFor;

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
        $sourceObj->article = $article_content;
    }
    
    $nodeList = $xpath->query("//a/@href");
    
    $sourceObj->getLink($nodeList, $clean_text);

    $link = "https:".$sourceObj->link;    
    $sourceObj->link = $link;


    echo json_encode($sourceObj);
    
}

    $text = "gilmar deve indeferir recurso que contesta proibição de cultos e levar caso ao plenário";
    crawl_page("G1", $text);
?>