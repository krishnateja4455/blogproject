<style>
.form{
  border-width:1px;
  border-style: solid;
  margin:50px;
  border-radius: 10px;
  padding:50px;
}
img {
   width:120px;
   height:120px;
   border-radius:50%;

}
.editicon{
 margin-top:10px;
 margin-left:10px;
 cursor:pointer;
}
</style>
<?php if(empty($userProfile)){?>
<div class="form">
<form method="post" action="/blogproject/Homepage/profile" enctype="multipart/form-data">
  <h3>Profile Detailes</h3><br />
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputPassword4">Upload Photo</label>
      <input type="file" name="photo">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name">
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">About You</label><br >
      <textarea rows="4" cols="63" name="about"></textarea>
    </div>


  </div>

  <button type="submit" class="btn btn-primary ">Save</button>
</form>
</div>
<?php }else{ ?>
  <div class="form">
    <div class="d-flex">
    <h3>Profile Detailes</h3>
    <a href="/blogproject/Homepage/profileedit?id=<?php echo $userProfile['id']?>"><i class="fa-regular fa-pen-to-square editicon"></i></a>
  </div>
    <br />
    <div class="col-md-6">

      <div class="col-md-3">
        <img src="<?php echo $this->request->webroot?>/images/<?php echo $userProfile['image_name']?>" >
      </div><br />

      <div class=" col-md-3">
        <p><b>Name:</b><?php echo $userProfile['name']?></p>
        <p><b>About:</b><?php echo $userProfile['about']?></p>
      </div>

    </div>

  </div>
<?php } ?>
