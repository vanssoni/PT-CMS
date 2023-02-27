@can('delete roles')
    {!! Form::open([ 'route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
        @can('edit roles')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('roles.edit', $role->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan