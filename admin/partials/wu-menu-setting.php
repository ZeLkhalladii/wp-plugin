<?php wp_enqueue_media(); ?>
<div class="container" style="width:90%">
    <div style="margin-top : 50px;">
        <div class="panel panel-success">
            <div class="panel-heading"><h1>Setting Page</h1></div>
            <div class="panel-body"><p>Here you can add a new playlist to your list !!!</p></div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading"><h2>Add New PlayList</h2></div>
        <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="addmembre">
            <div class="form-group">
                <label class="control-label col-sm-2" for="text">PlayList Name :</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">Duration (min) :</label>
                <!-- <input type="file" class="form-control" id="image" name="image" for="image" required> -->
                <div class="col-sm-10">
                    <!-- <button class="btn btn-info" type="button" id="test">Upload Image</button>
                    <span><img src="" id="media-image" style="height:100px;width:100px"></span>
                    <input type="hidden" id="image-url" name="image_url"> -->
                    <input type="text" id="age" class="form-control" name="age" placeholder="Enter your age" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="text">Gender for :</label>
                <div class="col-sm-10">
                    <?php $levels_array = array("RAP", "JAZ", "POP") ?>
                    <?php
                        foreach ($levels_array as $level) {
                    ?>
                    <input type="checkbox" name="level[]" class="form-control" value="<?php echo $level ?>"> <?php echo ucfirst($level); ?> <br/>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
    jQuery('#addmembre').validate({
        submitHandler:function(){
            // save data via post method : 
            var postdata = jQuery('#addmembre').serialize()+"&action=wusheengun_request&param=save_member";
            // console.log("postdata");
            jQuery.post(wu_ajax_url, postdata, function(response){
                // console.log(response);
                var data = jQuery.parseJSON(response);
                if(data.status == 1){
                    alert(data.message);
                }else{
                    alert(data.message);
                }
                location.reload();
            });
            
        }
    });
    // jQuery('#test').on("click", function(){
    //     // console.log("you passed your uplaod");
    //     var image = wp.media({
    //         itle:"Upload image for your account",t
    //         multiple:true 
    //     }).open().on("select", function(){
    //         // console.log("this is good");
    //         var files = image.state().get("selection").first();
    //         var jsonfiles = files.toJSON();
    //         // console.log(jsonfiles.title +" , "+jsonfiles.url);
    //         jQuery("#media-image").attr("src", jsonfiles.url);
    //         jQuery("#media-image").val("jsonfiles.url");
    //     });
    // });
    });
</script>