<?php

        function rss_to_array($tag, $array, $url, $limit=100) {
                $doc = new DOMdocument();
                $doc->load($url);
                $rss_array = array();
                $items = array();
                $count = 0;

                foreach($doc->getElementsByTagName($tag) AS $node) {
                        if(++$count > $limit){
                            break;
                        }    
                        foreach($array AS $key => $value) {
                                $items[$value] = $node->getElementsByTagName($value)->item(0)->nodeValue;
                        }
                        array_push($rss_array, $items);
                }
                return $rss_array;
        }
?>