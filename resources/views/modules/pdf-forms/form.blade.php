<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                <input type="text" name="title" id="name" class="gui-input"
                    placeholder="Title" required value="{{@$pdf->title}}">
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 hidden-xs">
        <div class="section">
            <label class="field prepend-icon file">
                <input type="file" class="gui-file" name="pdf" id="" accept="application/pdf" {{(!@$pdf->pdf ? 'required' :'')}}>
                <input type="text" class="gui-input" id="uploader2"
                placeholder="Select File" autocomplete="new_name" value='Choose File'>
                <span class="button">Choose File</span>
            </label>
        </div>
    </div>
</div>
