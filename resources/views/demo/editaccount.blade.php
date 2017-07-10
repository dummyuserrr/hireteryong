<form method="post" enctype="multipart/form-data" id="frmUpdateAccount" data-toggle="validator">
  {{ csrf_field() }}
  <div class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="fullname">Fullname:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="eFullname" placeholder="Fullname" value="{{ $user->fullname }}" name="fullname" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="eUsername" placeholder="Username" value="{{ $user->username }}" name="username" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="eEmail" placeholder="johndoe@email.com" value="{{ $user->email }}" name="email" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">New Password:</label>
      <div class="col-sm-10"> 
        <input type="password" class="form-control" id="epwd" placeholder="New Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd2">Re-enter New Password:</label>
      <div class="col-sm-10"> 
        <input type="password" class="form-control" id="epwd2" placeholder="Re-enter New Password" data-match="#epwd" name="password2" required>
      </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Profile Picture: </label>
        <div class="col-sm-10">
          <input class="btn btn-default btn-file" type="file" id="imgInp" name="photo" onchange="readURL(this)"> 
          <img id='img-upload'/>
        </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),
          log = label;
      if( input.length ){
          input.val(log);
      }else{
          if(log)alert(log);
      }
    });

    function readURL(input){
      if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#img-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function(){
      readURL(this);
    });   
  });
</script>

<script type="text/javascript" src="js/updateprofile.js"></script>