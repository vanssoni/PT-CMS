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
<div class="row mt-3 mb-3">
    <div class="checkbox-custom-mod checkbox-primary  col-md-3">
        <input type="checkbox"  {{(!@$pdf->is_visible_to_students ? (!@$pdf ?'checked' : '') : 'checked')}} id="checkbox-1" class='' name="is_visible_to_students" value='1' > 
        <label for="checkbox-1" class="">Visible To Students</label>
    </div>
    <div class="checkbox-custom-mod checkbox-primary  col-md-3">
        <input type="checkbox"  {{(!@$pdf->is_visible_to_instructors ? (!@$pdf ?'checked' : ''): 'checked')}} id="checkbox-1" class='' name="is_visible_to_instructors" value='1' > 
        <label for="checkbox-2" class="">Visible To Instructors</label>
    </div>
</div>
