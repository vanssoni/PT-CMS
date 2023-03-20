@can('delete fees')
    {!! Form::open([ 'route' => ['fees.destroy', $fee->id], 'method' => 'delete']) !!}
        @can('edit fees')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('fees.edit', $fee->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan