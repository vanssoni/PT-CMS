@can('delete road tests')
    {!! Form::open([ 'route' => ['road-tests.destroy', $roadTest->id], 'method' => 'delete']) !!}
        @can('edit road tests')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('road-tests.edit', $roadTest->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan