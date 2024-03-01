<style>
.upload-container{
  border-width: 2px;
  border-style: solid;
  border-radius: 10px;
  margin:50px;
  padding:10px;
}


</style>

<div class="col-md-12">

<div class="upload-container col-md-8 d-flex justify-content-center">
<form class="col-md-8" method="post" action="/blogproject/Homepage/upload" enctype="multipart/form-data">
  <h3>Upload Post</h3>
  <div class="form-group">
    <label for="exampleFormControlInput1">Upload Image</label>
    <input type="file"  id="exampleFormControlInput1" name="image" required>
  </div><br />
<div class="form-group">
  <label for="exampleFormControlInput1">Category</label>
 <select name="category" required>

<?php foreach ($Categories as $key => $value) { ?>
  <option value="<?php echo $value->id; ?>"><?php echo $value->category_name?></option>
<?php }?>
 </select>
</div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Heading</label>
    <textarea class="form-control"  rows="3" name="heading" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control"  rows="3" name="content" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary ">Upload</button>
</form>
</div>
</div>
