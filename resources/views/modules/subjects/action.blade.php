@can('delete subjects')
    {!! Form::open([ 'route' => ['subjects.destroy', $subject->id], 'method' => 'delete']) !!}
        @can('edit subjects')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('subjects.edit', $subject->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan