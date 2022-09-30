<?php

namespace App\Http\Controllers;

use App\Models\FormSurvey;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FormSurveyController extends Controller
{
    public function index()
    {
        return view('formsurvey');
    }

    public function stream($id)
    {
        $form = FormSurvey::find($id);
        if(!$form) return redirect()->back();
        $pdf = Pdf::loadView('formprint', ['form' => $form]);
        return $pdf->stream('form.pdf');

    }

    public function download($id)
    {
       $form = FormSurvey::find($id);
       if(!$form) return redirect()->back();
       $pdf = Pdf::loadView('formprint', ['form' => $form]);
       return $pdf->download();

//        return  view('formprint', ['form' => $form]);

    }

    public function insert(Request $request)
    {
        try {
            FormSurvey::create($request->toArray());
        } catch (\Exception $exception)
        {
            return redirect()->back()->with(['status' => 'failed']);
        }

        return redirect('/home')->with(['status' => 'success']);

    }

    public function show($id)
    {
        $form = FormSurvey::with('formdata')->where('id', $id)->first();

        if(!$form) return redirect('/home');

        return view('formdata', ['form' => $form]);
    }

    public function destroy($id)
    {
        $data = FormSurvey::find($id);
        $data->delete();

        return redirect()->back();
    }
}
