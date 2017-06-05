<section class="content">
        <div class="container-fluid">
            
            
<!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>Edit Magazine</b>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form action="<?=base_url('Homecontroller/edit_magz/')?><?php echo $id_magazine ?>" method="POST" enctype="multipart/form-data">
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" value="<?php echo $magz->title ?>" class="form-control" placeholder="Title" required>
                                    </div>
                                </div>
                                <label for="content">Content</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="content"  rows="3" class="form-control no-resize auto-growth" placeholder="Content" required>  <?php echo $magz->content ?> </textarea>

                                    </div>
                                </div>
                                <label for="title">Cover</label>
                                <small>(jpg/png extentions)</small>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control" placeholder="Image with " required><small>Current image : <?php echo $magz->image; ?></small>
                                         <input type="hidden" name="current_image" value="<?php echo $magz->image ?>">
                                    </div>
                                    <?php if ($this->session->flashdata('error') == TRUE ) { ?>
                                    <span class="text-danger"><?php echo $this->session->flashdata('error') ?></span><?php } ?>
                                </div>                                                                
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->            
            
        
        </div>
    </section>





















