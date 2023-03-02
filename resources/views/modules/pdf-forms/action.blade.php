@can('delete pdf forms')
    {!! Form::open([ 'route' => ['pdf-forms.destroy', $pdf->id], 'method' => 'delete']) !!}
        @can('edit pdf forms')
            <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('pdf-forms.edit', $pdf->id) }}">
                <i class="fa fa-edit"></i>
            </a>
        @endcan
        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endcan