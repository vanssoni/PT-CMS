<!-- Basic -->
<div class="row mb10">
    <div class="user-profile  col-md-4">
        <img src="{{@$user->profile_pic ?? url('/assets/img/avatars/profile_avatar.jpg')}}"  class="img-responsive" alt="Profile Picture" id="image-preview">
    </div>
</div>
 <div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="first_name" id="name" class="gui-input"
                    placeholder="First Name" required value="{{@$user->first_name}}">
                    <!-- @error('first_name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror -->
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="last_name" id="name" class="gui-input"
                    placeholder="Last Name"  value='{{@$user->last_name}}'>
                    <!-- @error('last_name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror -->
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="username" id="name" class="gui-input"
                    placeholder="username" required value='{{@$user->username}}'>
            </label>
        </div>
    </div>
    <div class="col-md-6 hidden-xs">
        <div class="section">
            <label class="field prepend-icon file">
                <input type="file" class="gui-file" name="profile_pic" id="image" accept="image/*">
                <input type="text" class="gui-input" id="uploader2"
                    placeholder="Select File" autocomplete="new_name" value='Choose File'>
                <span class="button">Choose File</span>
            </label>
        </div>
    </div>
</div>
<!-- File Uploader -->
<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field select">
                <select id="country" name="role" required>
                    <option value="">Select a role</option>
                   @foreach($roles as $role)
                    <option value="{{$role->name}}" {{ (@$user ? (@$user->hasRole($role->name) ? 'selected':'') : '')}}>{{$role->name}}</option>
                   @endforeach
                </select>
                <i class="arrow"></i>
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="password" name="password" id="password" class="gui-input"
                    placeholder="Choose Password" value="{{@$user->plain_password}}">
            </label>
        </div>
    </div>
</div>
<div class="row mb5">
    <div class="row">
        {{-- to show the validation error --}}
        <input type="hidden" name="permissions">
        <h5 class="">Permissions</h5>
    </div>
    @foreach($permissions as $key => $value)
        <h6 class="sub_permissions">{{ucwords($key)}} Permissions:</h6>
        @foreach($value as $permission)
            <div class="checkbox-custom-mod checkbox-primary mb5 col-md-3">
                <input type="checkbox"  {{ ( @$user  ?  ($user->can($permission) ? 'checked' : '') : '' )}} id="checkbox-{{$permission}}" class='' name="permissions[]" value='{{$permission}}' > 
                <label for="checkbox-{{$permission}}" class="">{{ucwords($permission)}}</label>
            </div>
        @endforeach
    @endforeach
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