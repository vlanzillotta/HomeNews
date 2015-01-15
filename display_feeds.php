<?php

include_once "include/settings.php";
include_once "include/rss_to_array.php";
include_once "include/debug.php";

$item_id = 1;
$feeds = array();
$xml = simplexml_load_file("xml/widgets.xml");
//print_r($xml);

$widgets = simpleXmlToArray($xml);

$feeds = $widgets["widget"];



$tables = array();
foreach($feeds as $values) {

    $Name = $values["name"];
    $rss_tags = array(
                'title',
                'link',
                'description'            
        );
        $rss_item_tag = $values["Tag"] ? $values["Tag"] : "item";
        $rss_url = $values["Url"];
        $values["Class"] = $values["Class"] ? $values["Class"] : "vhp_feed_default";
        
        $rssfeed = rss_to_array($rss_item_tag,$rss_tags,$rss_url, 10);

        $tables[] = makeTableFromRssArray($rssfeed, $Name, $values["Class"]);

}


//Break the tables into columns
$column_count = 0;
$column_tables = array();
foreach($tables as $table) {

   $column_tables[$column_count][] =  $table;
   $column_count++;
   if($column_count == ITEMS_PER_ROW){
        $column_count = 0;
   }
}



//this script takes care of drawing the page

require "draw_columns.php";


function makeTableFromRssArray($rssfeed, $name, $class_name){
    GLOBAL $item_id;
    $return_html = "<div class=$class_name id='feed_$item_id'>";
    $return_html .= "<div class=vhp_feed_title id='title_$item_id'>$name</div><div class=vfp_feed_items>";
    foreach ($rssfeed as $key => $values) {
        $return_html .= "<div class=vhp_post_name id='item_name_".$item_id."'>
            <a id='expand_button_".$item_id."'  class='vhp_expand_button'>&rarr;</a><a class=vhp_post_link id='vhp_post_link_".$item_id."' href='".$values["link"]."'>".$values["title"]."</a></div>";
        $return_html .= "<div class=vhp_post_description id='item_desc_".$item_id."'>".$values["description"]."</div>";

        $item_id++;
    }
    $return_html .= "</div></div>";
    return $return_html;

}


function simpleXmlToArray($xml_object){
   
    $json = json_encode($xml_object);
    $array = json_decode($json,TRUE);
    return $array;
}

?>




