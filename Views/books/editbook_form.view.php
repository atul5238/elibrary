
<?php
$msg1=$msg2=$msg3=$msg4=NULL;
?>
<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-md m-3">
      <div class="modal-dialog" role="form">
        <form action='/editbook' method="POST" enctype="multipart/form-data" >
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Book Details</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="book_name">Book Name*</label>
                <input type="text" class="form-control" id="book_name" name="book_name" value="<?=$book_name?>" required>
                <small class="form-text text-muted text-danger" id='errorbook_name'><?=$msg1?></small>
              </div>
              <div class="form-group">
                <label for="author_name">Author Name*</label>
                <input type="text" class="form-control" id="author_name" name="author_name" value="<?=$author_name?>" required>
                <small class="form-text text-muted text-danger" id='errorauthor_name'><?=$msg2?></small>
              </div>
              <div class="form-group">
                <label for="author_name">Book Count*</label>
                <input type="number" min="1" value="1" class="form-control" id="book_count" name="book_count" value="<?=$count?>" required>
                <small class="form-text text-muted text-danger" id='errorauthor_name'><?=$msg2?></small>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" value="<?=$description?>" > </textarea>
                <small class="form-text text-muted text-danger" id='errordescription'><?=$msg3?></small>
              </div>
              
          <div class="row mb-3"><?php $fetch='../../resources/uploads/'.$cover.".jpg";?>
          <label for="book_cover" class='mx-auto mt-2 align-self-center' >
            <img id="cover_image"  style='height:255px; width:170px;' <?="src='{$fetch}'";?> for='' alt='Book Cover'> 
          </label>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="book_cover" accept="image/*" name="book_cover">
          <label class="custom-file-label" for="book_cover">New Book Cover #</label>
          <small class="form-text text-muted ml-1"># Size Must Be Less Than 1MB</small> <small class="form-text text-muted text-danger" id='errorbook_cover'><?=$msg4?></small>
        </div>
        <input type="hidden" name="bid"   value="<?=$bid?>">
        <input type="hidden" name="cover_name"   value="<?=$cover?>">
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href='/login?view=books'>Close</a>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>

