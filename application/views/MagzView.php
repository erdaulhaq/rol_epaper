<section class="content">
        <div class="container-fluid">
            
            
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                MAGAZINE
                                <small>List of Magazine</small>
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                       
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($magz as $m) { ?>
                                    <tr>
                                        
                                        <td><?php echo $m['title'] ?></td>
                                        <td><?php echo $m['content'] ?></td>
                                        <td><?php echo $m['date'] ?></td>
                                        <td><?php echo $m['image'] ?></td>
        <td>
            <a href="<?php echo base_url();?>Magazine_controller/edit_magz_page/<?php echo $m['id_magazine']; ?>"><i class="material-icons">update</i></a>&nbsp &nbsp
            <a href="<?php echo base_url();?>Magazine_controller/delete_magz/<?php echo $m['id_magazine']; ?>" onclick="return confirm('Are you sure to delete this ?')" ><i class="material-icons">delete</i></a>
        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->
            
        
        </div>
    </section>

