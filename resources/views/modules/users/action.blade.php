@can('delete users')
    {!! Form::open([ 'route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
        @can('edit users')
            <button type="button" title="Update Password"  data-user-id="{{$user->id}}" class="btn btn-warning btn-icon-text btn-xs update-password-button" data-bs-toggle="modal" data-bs-target="#update-password-modal"><i class="fas fa-key"></i> </button>
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('users.edit', $user->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan