@can('delete users')
    {!! Form::open([ 'route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
        @can('edit users')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('users.edit', $user->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan