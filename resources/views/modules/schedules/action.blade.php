@can('delete schedules')
    {!! Form::open([ 'route' => ['schedules.destroy', $schedule->id], 'method' => 'delete']) !!}
        @can('edit schedules')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('schedules.edit', $schedule->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan