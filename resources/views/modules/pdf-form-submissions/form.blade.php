<div class="row">
    <div class="col-md-6">
        <p>Please kindly download the PDF form provided, fill in the necessary fields, and save the filled form as a new PDF document. Afterwards, kindly upload the newly filled and saved PDF form using the file upload function below. Thank you.</p>
       <p>Note*&nbsp;&nbsp;Please kindly take note that re-uploading the filled form will overwrite the existing file, if there was one uploaded previously.</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 hidden-xs">
        <input type="file" class="form-control" name="pdf" id="" accept="application/pdf" {{(!@$pdf->pdf ? 'required' :'')}}>
    </div>
    <input type="hidden" name='form_id' value="{{@$pdf->id}}">        
</div>
