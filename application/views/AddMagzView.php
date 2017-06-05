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
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                                    </div>
                                </div>
                                <label for="content">Content</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="content" rows="3" class="form-control no-resize auto-growth" placeholder="Content" required></textarea>
                                    </div>
                                </div>
                                <label for="title">Cover</label>
                                <small>(jpg/png extentions)</small>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control" placeholder="Image with " required>
                                    </div>
                                    <span class="text-danger"><?php if (isset($error)) echo $error; ?></span>
                                </div>                                                                
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














<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body align="center">
<form action="<?=base_url('Magazine_controller/add_news')?>" method="POST">
<br>
<b>ADD NEWS</b>
<br>
<br>
<table align="center">
	<tr>
		<td>Title</td>
		<td>:</td>
		<td><input type="text" placeholder="Title" name="title" required></td>		
	</tr>
	<tr>
		<td>Content</td>
		<td>:</td>
		<td><input type="text" placeholder="Content" name="content" required></td>		
	</tr>
	<tr>
		<td>Category</td>
		<td>:</td>
		<td>
			<select name="category">
			<?php foreach ($cat as $kategori) { ?>
			
				<option value="<?php echo $kategori['id_category'] ?>"><?php echo $kategori['name_category'] ?></option>
				<?php } ?>
			</select>
		</td>		
	</tr>
	<tr>
		<td>Image</td>
		<td>:</td>
		<td><input type="file" placeholder="Image" name="image"></td>
	</tr>

	
</table>
<button type="submit">Submit</button>
</form>
</body>
</html> -->