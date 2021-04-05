<?php

//format text for G1 URL
function formatTextG1($text) {
    return strtr($text, " ", "+");
}


//clear accents
function clearText($text) { 
    $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
    $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
    return str_replace($comAcentos, $semAcentos, $text);
}


function crawl_page($source = "G1", $depth = 5, $text)
{
    $url = null;
    $searchFor = null;
    $getElement = null;
    $whatExplode = null;
    $subExplode = null;
    $article = null;

    if($source === "G1") {
        $url = "https://g1.globo.com/busca/?q=";
        $searchFor = formatTextG1($text);
        $getElement = "content";
        $whatExplode = "G1";
        $subExplode = "...";
    }

    $url = $url.$searchFor;

    static $seen = array();
    if (isset($seen[$url]) || $depth === 0) {
        return;
    }

    $seen[$url] = true;

    $dom = new DOMDocument('1.0');
    @$dom->loadHTMLFile($url);

    $anchors = $dom->getElementById($getElement);

    $content = $anchors->textContent;

    $clean_content = clearText($content);
    $clean_text = clearText($text);

    if(stripos($clean_content, $clean_text)) {

        $dirt_array = explode($whatExplode, $content);
        $clean_array = explode($whatExplode, $clean_content);

        for ($i = 0; $i < count($clean_array); $i++) {
            if(stripos($clean_array[$i], $clean_text)) {
                $article = $dirt_array[$i];
                break; 
            }
        }
    }
    else {
        echo "FALSE";
    }

    if($article) {
        $article_content = explode($subExplode, $article);
    }



    /* foreach ($anchors as $element) {
        $href = $element->getAttribute('href');
        if (0 !== strpos($href, 'http')) {
            $path = '/' . ltrim($href, '/');
            if (extension_loaded('http')) {
                $href = http_build_url($url, array('path' => $path));
            } else {
                $parts = parse_url($url);
                $href = $parts['scheme'] . '://';
                if (isset($parts['user']) && isset($parts['pass'])) {
                    $href .= $parts['user'] . ':' . $parts['pass'] . '@';
                }
                $href .= $parts['host'];
                if (isset($parts['port'])) {
                    $href .= ':' . $parts['port'];
                }
                $href .= dirname($parts['path'], 1).$path;
            }
        }
        crawl_page($href, $depth - 1);
    } 
    echo "URL:",$url,PHP_EOL,"CONTENT:",PHP_EOL,$dom->saveHTML(),PHP_EOL,PHP_EOL; */
}

    $text = "gilmar deve indeferir recurso que contesta proibição de cultos e levar caso ao plenário";
    crawl_page("G1", 2, $text);
?>