<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use App\Models\FormSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormDataController extends Controller
{
    public function insert(Request $request)
    {
        $form = FormSurvey::find($request->form_survey_id);
        if(!$form) return redirect()->back();

        $validate = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'qty' => 'required',
            'ukur' => 'required'
        ]);

        if($validate->fails()) return redirect()->back()->with(['error' => $validate->errors()->toArray()]);

        try {
            FormData::create($request->all());
        }catch (\Exception $exception)
        {
            dd($exception);
            return redirect()->back()->with(['status' => 'failed']);
        }

        return redirect('/form/'.$request->form_survey_id)->with(['status' => 'success']);
    }

    public function destroy($id)
    {
        $data = FormData::find($id);
        $data->delete();

        return redirect()->back();
    }
}
