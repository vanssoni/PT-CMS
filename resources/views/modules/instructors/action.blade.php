@can('delete instructors')
    {!! Form::open([ 'route' => ['instructors.destroy', $instructor->user_id], 'method' => 'delete']) !!}
        @can('edit instructors')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('instructors.edit', $instructor->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan