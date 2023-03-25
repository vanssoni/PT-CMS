<a class="btn btn-success btn-icon-text btn-xs" href="{{$pdf->pdf}}" target="_blank">
    <i class="fa fa-eye"></i>
</a>
@if(isActiveRoute('pdf-forms.get-my-pdf-forms'))
    <a class="btn btn-primary btn-icon-text btn-xs" href="{{ route('pdf-forms.show', $pdf->id) }}">
        <i class="fa fa-upload"></i>
    </a>
@endif