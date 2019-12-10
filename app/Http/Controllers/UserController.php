<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index() {
        return view('user.index');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return view('welcome');
    }

    public function editpass() {
        return view('user.editpass');
    }

    public function validatepass(array $data)
    {
        $messages = [
            'old_password.required' => 'Please enter current password',
            'new_password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirm' => 'required|same:new_password',
        ], $messages);

        return $validator;
    }

    public function updatepass(Request $request) {
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->validatepass($request_data);
            if($validator->fails())
            {
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            }
            else
            {
                $current_password = Auth::User()->password;
                if(Hash::check($request_data['old_password'], $current_password))
                {
                    $user = Auth::User();
                    $user->password = Hash::make($request_data['new_password']);;
                    $user->save();
                    return view('welcome');
                }
                else
                {
                    $error = array('old_password' => 'Please enter correct current password');
                    return response()->json(array('error' => $error), 400);
                }
            }
        }
        else
        {
            return view('welcome');
        }
    }
}
