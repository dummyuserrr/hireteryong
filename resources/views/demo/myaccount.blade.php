<div class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2" for="fullname">Profile Picture:</label>
    <div class="col-sm-10">
      @if($user->photo)
        <img src="{{ $user->photo }}" id="profilePicture" class="img-responsive">
      @else
        <p>You have no profile picture</p>
      @endif
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="fullname">Fullname:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fullname" placeholder="Fullname" value="{{ $user->fullname }}" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" placeholder="Username" value="{{ $user->username }}" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="johndoe@email.com" value="{{ $user->email }}" disabled>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary" onclick="editAccount()">Edit</button>
    </div>
</div>