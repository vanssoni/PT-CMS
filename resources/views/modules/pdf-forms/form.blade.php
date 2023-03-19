<div class="row">
    <div class="col-md-6">
        <input type="text" name="title" id="name" class="form-control"
                    placeholder="Title" required value="{{@$pdf->title}}">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 hidden-xs">
        <input type="file" class="form-control" name="pdf" id="" accept="application/pdf" {{(!@$pdf->pdf ? 'required' :'')}}>
                
    </div>
</div>
