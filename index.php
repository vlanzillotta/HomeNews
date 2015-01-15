<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Homepage</title>
    <link media="all" rel="stylesheet" type="text/css" href="css/main.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />  
</head>
<body>
<?
require "add_feed.php"
?>
<div class="vhp_mainbar">
    <div id="homepage_widget_wrapper">
        <div class="vhp_top_news" >
            <table class="vhp_top_news_items" align=center>
                <tr>
                    <td id="top_news_cell"></td>
                </tr>
            </table>
            <!--    <a href='javascript:hideTopNews();' >[0]</a>-->

        </div>

    <? require "display_feeds.php" ?>

    </div>
</div>
<script type="text/javascript" src="jquery/main.js"></script>
<script>
     $(document).ready(function() {
       fillTopNews();
    });

    function hideTopNews(){
        newsArea = $("#top_news_cell"); 
        $(newsArea).fadeOut("slow", fillTopNews);
    }
    function fillTopNews(){
        /*Pick 5 random links from the page and post them in top news*/
        newsArea = $("#top_news_cell");  
        $(newsArea).html("");
        randomElement = jQuery(".vhp_post_link").get().sort(function(){ 
          return Math.round(Math.random())-0.5
        }).slice(0,5);
        $(randomElement).each(function(index, element){
            title = ($(element).html());
            source = ($(element).attr("href"));
            linkHtml = '<a href="'+ source + '"><div id="top_news_1" class="vhp_top_news_item" style="background-image:url(\'http://www.media.objectivev.com/findThumb.php?url='+escape(source) +'\');background-color:#0C0D39;"><span class="vhp_borderedText" >'+ title + '</span></div></a>';
            $(newsArea).html($(newsArea).html()+linkHtml);
        }) 
        $(newsArea).fadeIn("slow");
    }
</script>

</body>
</html>
