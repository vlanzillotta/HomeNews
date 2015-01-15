<?php
header('content-type: image/gif'); 

$url = $_GET["url"];

$doc = new DOMDocument();
@$doc->loadHTMLFile($url);

// print_r($doc);
// echo $doc->saveHTML();

$ImageTags = $doc->getElementsByTagName("img");
$imageSizes = array();
foreach ($ImageTags as $tag) {
        $imageSrc =  $tag->getAttribute('src');
        $url_parts = parse_url($url);
        $mainDomain = $url_parts["scheme"]."://".$url_parts["host"];

        if(!stristr($imageSrc, $mainDomain)){
            // echo "$imageSrc did not have a domain so it is now ";
            $imageSrc = $mainDomain.$imageSrc;
        }
        $size = '';
        @$size = getimagesize($imageSrc);
        if($size){
            $imageSizes[$imageSrc] = $size;
        }
}

// print_r($imageSizes);

$winner = array();
foreach ($imageSizes as $ImageSource => $values) {
    $pixels = $values[0] * $values[1];
    if($pixels > $winner["pixels"] && runThroughExceptions($ImageSource, $values)){
        $winner["pixels"] = $pixels;
        $winner["source"] = $ImageSource;
    }
}
echo file_get_contents($winner["source"]);

function runThroughExceptions($url, $values){
    //check the url and image properties to try and stop adds or other garbage from showing up
    return true;
}



?>