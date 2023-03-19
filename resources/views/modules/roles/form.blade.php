<div class="row">
    <div class="col-8 mb-3">
        @csrf
        <input type="text" name="name" id="name" class="form-control"
            placeholder="Name" required value="{{@$role->name}}" {{(@$role->name == 'instructor' ? 'readonly': '')}}>
    </div>
</div>
<div class="row mb5">
    <div class="col-md-12 pt18">
        <h4 class="">Permissions:</h4>
    </div>
    <input name='permissions' class="d-none">
    @foreach($permissions as $key => $value)
        <h5 class="sub_permissions mt-4">{{ucwords($key)}} Permissions:</h5>
        @foreach($value as $permission)
            <div class="checkbox-custom-mod checkbox-primary mb5 col-md-3">
                <input type="checkbox"  {{ ( @$role  ?  ($role->hasPermissionTo($permission) ? 'checked' : '') : '' )}} id="checkbox-{{$permission}}" class='' name="permissions[]" value='{{$permission}}' > 
                <label for="checkbox-{{$permission}}" class="">{{ucwords($permission)}}</label>
            </div>
        @endforeach
    @endforeach
</div>