<!-- Basic -->
<div class="row mb10">
    <div class="  col-md-4">
        <img src="{{@$user->profile_pic ?? url('/assets/img/avatars/profile_avatar.jpg')}}" alt="image" class="img-fluid avatar-xl rounded" id="image-preview">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
       
        <input type="text" name="first_name" id="name" class="form-control"
            placeholder="First Name" required value="{{@$user->first_name}}">
    </div>
    <div class="col-md-6">
       
        <input type="text" name="last_name" id="name" class="form-control"
            placeholder="Last Name"  value='{{@$user->last_name}}'>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
      
        <input type="text" name="username" id="name" class="form-control"
                    placeholder="Username" required value='{{@$user->username}}'>
    </div>
    <div class="col-md-6">
        <input type="file" class="form-control" name="profile_pic" id="image" accept="image/*">
    </div>
</div>
<!-- File Uploader -->
<div class="row mt-3">
    <div class="col-md-6">
        
        <select id="country" name="role" required class="form-control">
            <option value="">Select a role</option>
            @foreach($roles as $role)
            <option value="{{$role->name}}" {{ (@$user ? (@$user->hasRole($role->name) ? 'selected':'') : '')}}>{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <input type="password" name="password" id="password" class="form-control"
                    placeholder="Choose Password" value="{{@$user->plain_password}}">
    </div>
</div>
@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-preview').attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function(){
            readURL(this);
        });
    </script>
@endpush