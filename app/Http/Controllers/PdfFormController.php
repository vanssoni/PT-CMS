<?php

namespace App\Http\Controllers;

use App\Models\PdfForm;
use App\Models\PdfFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use File;
class PdfFormController extends Controller
{
   
    public function index(Request $request){
        //authorize the action
        $this->authorize('view pdf forms', \Auth::user());

        $pdfforms = PdfForm::get();
        return view('modules.pdf-forms.index', compact('pdfforms'));
    }

    public function create(Request $request){
        //authorize the action
        $this->authorize('create pdf forms', \Auth::user());
        return view('modules.pdf-forms.create');
    }

    public function store(Request $request){
        //authorize the action
        $this->authorize('create pdf forms', \Auth::user());
        $request['is_visible_to_students'] = (!$request->is_visible_to_students ? 0 : 1);
        $request['is_visible_to_instructors'] = (!$request->is_visible_to_instructors ? 0 : 1);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'pdf' => "required",
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $pdf =  PdfForm::create($request->except(['_token', 'pdf']));
        if($request->hasFile('pdf')){
            $pdf_name = str_replace(' ', '_', rand(9, 999).'_'.$request->pdf->getClientOriginalName());  
           
            $request->pdf->move(storage_path('app/public/pdf-forms/'), $pdf_name);
            $pdf->pdf = $pdf_name;
        }
        $pdf->save();
        return redirect()->route('pdf-forms.index')->withSuccess('Pdf Form Uploaded Successfully!');
    }

    public function view(Request $request, $id){
        //authorize the action
        $this->authorize('view pdf forms', \Auth::user());

        $user = PdfForm::find($id);
        return view('modules.pdf-forms.view', compact('user'));
    }

    public function edit(Request $request, $id){
        //authorize the action
        $this->authorize('edit pdf forms', \Auth::user());

        $pdf = PdfForm::find($id);
        return view('modules.pdf-forms.edit', compact('pdf'));
    }

    public function update(Request $request, $id){
        //authorize the action
        $this->authorize('edit pdf forms', \Auth::user());
        $request['is_visible_to_students'] = (!$request->is_visible_to_students ? 0 : 1);
        $request['is_visible_to_instructors'] = (!$request->is_visible_to_instructors ? 0 : 1);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            // 'pdf' => "required",
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $pdf = PdfForm::find($id);
        $pdf->update($request->except(['_token', 'pdf']));
        if($request->hasFile('pdf')){
            //delete the exisiting file
            $pdfFile = storage_path('app/public/pdf-forms/').$pdf->getRawOriginal('pdf');
            if( file_exists($pdfFile) ){
                unlink($pdfFile);
            }
            $pdf_name = str_replace(' ', '_', rand(9, 999).'_'.$request->pdf->getClientOriginalName()); 
            $request->pdf->move(storage_path('app/public/pdf-forms/'), $pdf_name);
            $pdf->pdf = $pdf_name;
        }
        $pdf->save();
        return redirect()->route('pdf-forms.index')->withSuccess('Pdf Form  Updated Successfully!');
    }
    public function destroy( $id){
        
        //authorize the action
        $this->authorize('delete pdf forms', \Auth::user());

        $pdf = PdfForm::find($id);
        //delete the exisiting file
        $pdfFile = storage_path('app/public/pdf-forms/').$pdf->getRawOriginal('pdf');
        if( file_exists($pdfFile) ){
            unlink($pdfFile);
        }
        $pdf->delete();
        return redirect()->route('pdf-forms.index')->withSuccess('Pdf form deleted Successfully!');
    }
    
    //this function will return all the pdf available for user upload 
    public function getMyPdfFormsToSubmit(Request $request){
        $column = ( \Auth::user()->hasRole('student')   ?   'is_visible_to_students' : 'is_visible_to_instructors');
        $pdfforms = PdfForm::where($column, 1)->get();
        $uploadedForms = PdfFormSubmission::where('user_id', \Auth::id())->pluck('form_id')->toArray();
        return view('modules.pdf-form-submissions.my-pdf-forms', compact('pdfforms', 'uploadedForms'));
    }
    public function show($id){
        $pdf = PdfForm::find($id);
        return view('modules.pdf-form-submissions.create', compact('pdf'));
    }
    //this function will return all the pdf available for user upload 
    public function submitPdfForm(Request $request){
        $validator = Validator::make($request->all(), [
            'form_id' => 'required',
            'pdf' => "required",
        ]);
 
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $request['user_id'] = \Auth::id();
        $existingForm = PdfFormSubmission::where('user_id',\Auth::id())->where('form_id', $request->form_id)->first();
        if($existingForm){
            $pdf_submission =  $existingForm;
        }else{
            $pdf_submission =  PdfFormSubmission::create($request->except(['_token']));
        }

        if($request->hasFile('pdf')){
            $pdf_submission_name = str_replace(' ', '_', rand(9, 999).'_'.$request->pdf->getClientOriginalName());  
           
            $request->pdf->move(storage_path('app/public/pdf-form-submissions/'), $pdf_submission_name);
            $pdf_submission->pdf = $pdf_submission_name;
        }

        $pdf_submission->save();
        return redirect()->route('pdf-forms.get-my-pdf-forms')->withSuccess('Pdf form submitted successfully!');
    }

    //this function will return all the pdf submission 
    public function getPdfFormSubmissions  (Request $request){
        //authorize the action
        $this->authorize('view pdf forms', \Auth::user());

        $pdfFormSubmissions = PdfFormSubmission::with(['user', 'pdf_form'])->get();
        return view('modules.pdf-form-submissions.index', compact('pdfFormSubmissions'));
    }
}
