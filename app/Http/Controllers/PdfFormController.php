<?php

namespace App\Http\Controllers;

use App\Models\PdfForm;
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
        $this->authorize('create users', \Auth::user());

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'pdf' => "required",
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        // dd($request->all());
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
}
