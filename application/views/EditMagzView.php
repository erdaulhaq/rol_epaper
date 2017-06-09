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
                            <form action="<?=base_url('Magazine_controller/edit_magz/')?><?php echo $id_magazine ?>" method="POST" enctype="multipart/form-data">
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
                                        <input type="file" name="image" class="form-control" placeholder="Image with "><small>Current image : <?php echo $magz->image; ?></small>
                                         <input type="hidden" name="current_image" value="<?php echo $magz->image ?>">
                                    </div>
                                    <?php if ($this->session->flashdata('error') == TRUE ) { ?>
                                    <span class="text-danger"><?php echo $this->session->flashdata('error') ?></span><?php } ?>
                                </div>
                                <br>
                                <br>
                                <div class="body table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                               
                                                <th>Page</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Author</th>
                                                <th>Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($magz_detail as $md) { ?>
                                            <tr>
                                                <td><?php echo $md['page'] ?></td>
                                                <td><?php echo $md['title'] ?></td>
                                                <td><?php echo $md['content'] ?></td>
                                                <td><?php echo $md['author'] ?></td>
                                              
                                                <td>
                                                    <a href="<?php echo base_url();?>Magazine_controller/edit_magz_page/<?php echo $md['id_magz_detail']; ?>"><i class="material-icons">update</i></a>&nbsp &nbsp
                                                    <a href="<?php echo base_url();?>Magazine_controller/delete_magz/<?php echo $md['id_magz_detail']; ?>" onclick="return confirm('Are you sure to delete this ?')" ><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                     <a href="<?php echo base_url();?>Magazine_controller/add_hal_page/<?php echo $id_magazine; ?>"><button type="Button" class="btn btn-warning m-t-15 waves-effect">ADD PAGE</button></a>
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