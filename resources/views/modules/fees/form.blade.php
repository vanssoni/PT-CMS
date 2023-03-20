<!-- Basic -->
<div class="row">
    <div class="col-md-6">
        <div class="row mb10">
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="date" class="floating-label control-label">Date:</label>
                        <input class="form-control datepicker-default" id="date" type="text" placeholder="Date" name="date" value="{{@$fee->date}}" required>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="location" class="floating-label control-label">Amount:</label>
                        <input class="form-control" id="amount" type="number" placeholder="Amount" name="amount" value="{{@$fee->amount}}" required step=".01">
                </div>
            </div>
            @if(!@$fee)
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label for="disabledInput" class="floating-label control-label">Student:</label>
                    
                        <select id="students" name="student_id" required class="form-control">
                            <option value=''>Select Student</option>
                            @foreach($students as $student)
                                <option value='{{$student->id}}' {{(@$student->id == @$fee->student_id ? 'selected' :'')}}>{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>           
                </div>
            @else
                <input type="hidden" name="student_id" value="{{@$fee->student_id}}">
            @endif
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="disabledInput" class="floating-label control-label">Payment Mode:</label>
                
                    <select id="" name="payment_mode" required class="form-control">
                        <option value=''>Select Payment mode</option>
                            <option value="Cash" {{('Cash' == @$fee->payment_mode ? 'selected' :'')}}>Cash</option>
                            <option value="Credit" {{('Credit' == @$fee->payment_mode ? 'selected' :'')}}>Credit</option>
                            <option value="Debit" {{('Debit' == @$fee->payment_mode ? 'selected' :'')}}>Debit</option>
                            <option value="Cheque" {{('Cheque' == @$fee->payment_mode ? 'selected' :'')}}>Cheque</option>
                            <option value="E-Transfer" {{('E-Transfer' == @$fee->payment_mode ? 'selected' :'')}}>E-Transfer</option>
                            <option value="Others" {{('Others' == @$fee->payment_mode ? 'selected' :'')}}>Others</option>
                    </select>
                </div>           
            </div>
        </div>
    </div>
</div>