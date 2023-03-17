@can('delete students')
    {!! Form::open([ 'route' => ['students.destroy', $student->user_id], 'method' => 'delete']) !!}
        @can('view students')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('students.show', $student->id) }}">
                <i class="fa fa-eye"></i>
            </a>
        @endcan
        @can('edit students')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('students.edit', $student->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan