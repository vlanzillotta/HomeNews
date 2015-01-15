



setUpShowHide();
setUpLargeImages();
runLightbox();

function setUpShowHide(){
    $('.vhp_expand_button').each(function() {
        $(this).click(function(){

          handleExpand($(this));

        });
        
    });
}

function handleExpand(control){
    var sender_id = control.attr("id");
    var target_id = sender_id.replace("expand_button_", "item_desc_");

    if($("#"+target_id).css("display") == "none"){
        $("#"+target_id).slideDown("fast");
        control.html("&darr;");
    }else{
        $("#"+target_id).slideUp("fast");
        control.html("&rarr;");
    }
    
}




function setUpLargeImages(){
    $('.vhp_post_description').each(function() {

       

        $(this).find('img').each(function(){
            
            

            if($(this).attr("width") > 350){
                $(this).wrap('<a href="'+$(this).attr("src")+'" class="zoomimage" />');
            }

        });
        
    });
}

function runLightbox(){

    $(function() {
        $('.zoomimage').lightBox();
    });
}