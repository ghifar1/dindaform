<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function insert(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email',
            'password' => 'required|confirmed'
        ]);

        if($validate->fails())
        {
            return redirect()->back()->with(['errors' => $validate->errors()]);
        }

        User::create(array_merge($request->toArray(), ['password' => Hash::make($request->password)]));

        return redirect()->back()->with(['success' => true]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if(!$user) return redirect()->back();

        $user->delete();
        return redirect()->back();
    }
}
