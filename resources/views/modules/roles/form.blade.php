<div class="row">
    <div class="col-md-6">
        <div class="section">
            <label class="field">
                @csrf
                <input type="text" name="name" id="name" class="gui-input"
                    placeholder="Name" required value="{{@$role->name}}">
            </label>
        </div>
    </div>
</div>