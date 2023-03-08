@extends('layouts.app')

@section('content')

    <!-- Column Center -->
    <div class="chute chute-center">
        {{-- <-- Spec Form --> --}}
        <div class="allcp-form">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">Update student
                    </div>
                </div>
                <div class="panel-body">
                    {!! Form::open([
                        'route' => ['students.update', $student->id],
                        'method' => 'put',
                        'files'  => true,
                        'class' => 'forms-sample']) !!}
                    @include('modules.students.form')
                    {!! Form::submit('Update', ['class' => 'btn btn-primary ml-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
    <!-- /Column Center -->
@endsection
              