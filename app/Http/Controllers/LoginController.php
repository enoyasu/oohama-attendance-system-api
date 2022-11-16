<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\AdminUser;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $req_usr_name = $request->input('name');
        $req_usr_pass = $request->input('password');
        $hash__req_usr_pass = hash("sha256",$req_usr_pass);
        try {
            $login_info = AdminUser::first();
            if ($login_info['name'] == $req_usr_name && $login_info['password'] == $hash__req_usr_pass) {
                $status = 200;
                $process_msg = 'success';
            } else {
                $status = 500;
                $process_msg = 'Bad Request';
            }
            return response()->json([
                'status' => $status,
                'process_msg' => $process_msg
            ]);
        } catch(\Exception $e) {
            return response()->json($status,$e);
        }

    }
}
