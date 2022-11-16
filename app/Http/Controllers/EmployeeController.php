<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Employee;
use  App\Models\EmployeeProfile;

class EmployeeController extends Controller
{
    public function index() 
    {
        $emp = Employee::all();
        // dd($emp);
        // return view('welcome')->with('employees',$emp);
        return response()->json($emp,200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8mb4'],JSON_UNESCAPED_UNICODE);
    }

    public function create(Request $request)
    {
        $emp = new Employee();
        $emp_prof = new EmployeeProfile();

        $emp = [
            'name' => $request->input('name'),
            'name_kana' => $request->input('name_kana'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $emp_prof = [
            'emp_id' => mysql_insert_id(),
            'h_pay' => $request->input('h_pay'),
            'tel' => $request->input('tel'),
            'address' => $request->input('address'),
            'birthday' => $request->input('birthday'),
            'memo' => $request->input('memo'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        $emp->save();
        $emp_prof->save();

        return response()->json(Employee::all());
    }

    public function show(Int $id)
    {
        $emp = Employee::find($id);
        return response()->json($emp,200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8mb4'],JSON_UNESCAPED_UNICODE);
    }

}
