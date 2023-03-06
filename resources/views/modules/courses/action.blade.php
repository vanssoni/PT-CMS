@can('delete courses')
    {!! Form::open([ 'route' => ['courses.destroy', $course->id], 'method' => 'delete']) !!}
        @can('edit courses')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('courses.edit', $course->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan