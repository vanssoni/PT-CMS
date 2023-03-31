<!-- Basic -->
<div class="row mb10">
    <div class="  col-md-4">
        <img src="{{@$user->profile_pic ?? url('/assets/img/avatars/profile_avatar.jpg')}}" alt="image" class="img-fluid avatar-xl rounded" id="image-preview">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
       
        <input type="text" name="first_name" id="name" class="form-control"
            placeholder="First Name" required value="{{@$user->first_name}}">
    </div>
    <div class="col-md-6 mt-3">
       
        <input type="text" name="last_name" id="name" class="form-control"
            placeholder="Last Name"  value='{{@$user->last_name}}'>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
       
        <input type="email" name="email" id="name" class="form-control"
            placeholder="Email" required value="{{@$user->email}}" required>
    </div>
    <div class="col-md-6 mt-3">
      
        <input type="text" name="username" id="name" class="form-control"
                    placeholder="Username" required value='{{@$user->username}}'>
    </div>
    <div class="col-md-6 mt-3">
        <input type="file" class="form-control" name="profile_pic" id="image" accept="image/*">
    </div>
    <div class="col-md-6 mt-3">
        
        <select id="country" name="role" required class="form-control">
            <option value="">Select a role</option>
            @foreach($roles as $role)
            <option value="{{$role->name}}" {{ (@$user ? (@$user->hasRole($role->name) ? 'selected':'') : '')}}>{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mt-3">
        <input type="password" name="password" id="password" class="form-control"
                    placeholder="Choose Password" value="{{@$user->plain_password}}">
    </div>
    <div class="col-md-6 mt-3">
        <select id="country" name="is_active" required class="form-control">
            <option value="">Select Status</option>
            <option value="1" {{ (@$user->is_active == 1  ?'selected':'' )}}>Active</option>
            <option value="0" {{(@$user ?  (@$user->is_active == 0  ?'selected':'' ) : '')}} >In-active</option>
        </select>
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