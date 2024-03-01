<style>
.form{
  border-width:1px;
  border-style: solid;
  margin:50px;
  border-radius: 10px;
  padding:50px;
}

</style>


<div class="form">
<form method="post" action="/blogproject/Homepage/profileupdate" enctype="multipart/form-data">
  <h3>Edit Profile Detailes</h3><br />
  <div class="form-row">
    <input type="hidden" value="<?php echo $detailes['id']?>" name="id"/>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Upload Photo</label>
      <input type="file" name="photo">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $detailes['name']?>">
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">About You</label><br >
      <textarea rows="4" cols="63" name="about" ><?php echo $detailes['about']?></textarea>
    </div>


  </div>

  <button type="submit" class="btn btn-primary ">Save</button>
</form>
</div>
