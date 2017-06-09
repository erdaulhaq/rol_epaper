<section class="content">

        <div class="container-fluid">
            
            
<!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>Add Magazine</b>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form action="<?=base_url('Magazine_controller/add_magazine')?>" method="POST" enctype="multipart/form-data" >
                               <!--  <label for="title">No Edisi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                                    </div>
                                </div> -->
                                <?php $data = $this->session->flashdata('data'); ?>
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo $data['title']; ?>" name="title" class="form-control" placeholder="Title" required>
                                    </div>
                                </div>
                                <label for="content">Content</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="content" rows="3" class="form-control no-resize auto-growth" placeholder="Content" required><?php echo $data['title']; ?></textarea>
                                    </div>
                                </div>
                                <label for="title">Cover</label>
                                <small>(jpg/png extentions)</small>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control" placeholder="Image with " required>
                                    </div>
                                    <span class="text-danger"><?php echo $data['error']; ?></span>
                                </div>
                                <div class="header">
                                    <h2>
                                    <b>Add Page</b>
                                    </h2>
                                </div>
                                <label for="title">Image</label>
                                <small>(jpg/png extentions)</small>
                                <div id='target_append' class="form-group">
                                    <div id = 'template' class="form-line">
                                        <input type="file" name="image_page[0]" class="form-control ch-image" placeholder="Image with " required>

                                    </div>

                                    <!-- <span class="text-danger"><?php if (isset($error)) echo $error; ?></span> -->
                                </div>
                                <button type="button" id="delete_image" class="btn btn-danger ch-button">Hapus Gambar</button>
                                <button type="button" id="add_image" class="btn btn-warning ch-button" value="">Add Image</button>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->            
            
        
        </div>
    </section>


<script>
$(document).ready(function () {
var counter = 1;
    $("#add_image").click(function () {
        var new_elem = $("#template").clone()
                .appendTo("#target_append")
                .show().attr("id", "template" + counter);
                new_elem.find(".ch-image").attr("name","image[" + counter +"]");
        counter ++;
    });
    $("#delete_image").click(function () {
        if(counter == 1){
            alert("Tidak bisa hapus lagi");
            return false;
        }
            counter --;
            $("#template" + counter).remove();    
        
    });
    /*$(document).on('click', '.btn-danger', function() {
        $(this).parent().parent().parent().parent().parent().parent().remove();
    });*/
});
</script>