function passwordMatch(id1,id2){
  var fieldId1=document.getElementById(id1);
  var fieldId2=document.getElementById(id2);
  var errorId='error'+id2;  
  errorId=document.getElementById(errorId);
  if(fieldId2.value==''){
    errorId.innerHTML="<div class='text-danger'>Please Enter Password</div>";
    fieldId2.classList.remove("is-valid");
    fieldId2.classList.add("is-invalid");
    return false;
  } else if(fieldId1.value!=fieldId2.value){
    errorId.innerHTML="<div class='text-danger'>Confirm Password doesn't match with Password Field</div>";
    fieldId2.classList.remove("is-valid");
    fieldId2.classList.add("is-invalid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId2.classList.remove("is-invalid");
    fieldId2.classList.add("is-valid");
    return true;
  }
}
function checkFileInput(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if (fieldId.files[0].size> 1048576 || fieldId.files[0].size== 0){
    errorId.innerHTML="<div class='text-danger'>Invalid File Size</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId.classList.remove("is-invalid");
    fieldId.classList.add("is-valid");
    return true;
  }  

}
function checkFieldName(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if(fieldId.value==''){
    errorId.innerHTML="<div class='text-danger'>Entry is required</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  }   else{
    errorId.innerHTML="";
    fieldId.classList.remove("is-invalid");
    fieldId.classList.add("is-valid");
    return true;
  }  
}
function checkFieldEmail(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if(fieldId.value==''){
    errorId.innerHTML="<div class='text-danger'>Email is required</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(fieldId.value)){
    errorId.innerHTML="<div class='text-danger'>Invalid Email Address</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId.classList.remove("is-invalid");
    fieldId.classList.add("is-valid");
    return true;
  }
}
function checkFieldPassword(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if (fieldId.value.length<8){
    errorId.innerHTML="<div class='text-danger'>Password must be greater than equal to 8</div>";
    fieldId.classList.add("is-invalid");
    fieldId.classList.remove("is-valid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId.classList.add("is-valid");
    fieldId.classList.remove("is-invalid"); 
    return true;
  }
}

$('#deleteUserModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var user_name = button.data('uname') 
  var uid = button.data('uid')
  var modal = $(this)
  modal.find('.modal-body #user_name').html(user_name)
  modal.find('.modal-body #uid').val(uid)
})
$('#deleteBookModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var book_name = button.data('bname') 
  var bid = button.data('bid')
  var modal = $(this)
  modal.find('.modal-body #book_name').html(book_name)
  modal.find('.modal-body #bid').val(bid)
})

$('#editBookModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var book_name = button.data('bookname') 
  var bid = button.data('bid') 
  var author_name = button.data('authorname') 
  var edition = button.data('edition') 
  var modal = $(this)
  modal.find('.modal-body #book_name').val(book_name)
  modal.find('.modal-body #bid').val(bid)
  modal.find('.modal-body #author_name').val(author_name)
  modal.find('.modal-body #edition').val(edition)
})

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#cover_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#book_cover").change(function() {
  readURL(this);
});