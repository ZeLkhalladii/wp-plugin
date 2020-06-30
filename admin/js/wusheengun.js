jQuery(document).ready(function() {
    jQuery('#wu-sheengun').DataTable();

    jQuery('#addmembre').validate({
        submitHandler:function(){
            // save data via post method : 
            var postdata = jQuery('#addmembre').serialize();
            // console.log("postdata");
            // jQuery.post(url, data, function());
        }
    });
    jQuery('#test').on("click", function(){
        console.log("you passed your uplaod");
        var image = wp.media({
            title:"Upload image for your account",
            multiple:false 
        }).open().on("select", function(){
            console.log("this is good");
        });
    });

    // jQuery('#media').on('click', function(){
    //     // console.log('everything is good');
    //     var media = wp.media({
    //         title : "Upload Image",
    //         multiple : false
    //     }).open().on("select", function(){
    //         // console.log("this is good");
    //         var files = media.state().get('selection');
    //         console.log("files");
    //     });
    // });

} );
