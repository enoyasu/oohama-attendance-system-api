<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Employee;
use  App\Models\EmployeeProfile;
use Illuminate\Support\Facades\DB;

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

        try {
            $new_emp = $emp->create([
                'name'       => $request->input('name'),
                'name_kana'  => $request->input('name_kana'),
                'gender'     => $request->input('gender'),
                'age'        => $request->input('age'),
                'created_at' => $request->input('created_at'),
                'updated_at' => $request->input('updated_at'),
            ]);

            $emp_prof->create([
                'emp_id'     => $new_emp->id,
                'h_pay'      => $request->input('h_pay'),
                'tel'        => $request->input('tel'),
                'address'    => $request->input('address'),
                'birthday'   => $request->input('birthday'),
                'memo'       => $request->input('memo'),
                'created_at' => $request->input('created_at'),
                'updated_at' => $request->input('updated_at'),
            ]);
            if ($new_emp) {
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
            \Log::info($e->getMessage());
            return response()->json($status,$e);
        }

        return response()->json(Employee::find($new_emp->id));
    }

    public function detail(Int $id)
    {
        $emp_prof = DB::table('employees')
            ->join('employee_profile', 'employees.id', '=', 'employee_profile.emp_id')
            ->select(
                'employees.id as emp_id',
                'employees.name as name',
                'employees.name_kana as name_kana',
                'employees.gender as gender',
                'employees.age as age',
                'employee_profile.h_pay as h_pay',
                'employee_profile.tel as tel',
                'employee_profile.address as address',
                'employee_profile.birthday as birthday',
                'employee_profile.memo as memo',
                'employees.del_flg as del_flg',
                )
            ->where('employees.id', '=', $id)
            ->get();
        return response()->json($emp_prof,200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8mb4'],JSON_UNESCAPED_UNICODE);
    }

    public function edit(Request $request)
    {
        $emp = new Employee();
        $emp_prof = new EmployeeProfile();

        $emp->name            = $request->input('name');
        $emp->name_kana       = $request->input('name_kana');
        $emp->gender          = $request->input('gender');
        $emp->age             = $request->input('age');
        $emp->updated_at      = now();
        $emp_prof->h_pay      = $request->input('h_pay');
        $emp_prof->tel        = $request->input('tel');
        $emp_prof->address    = $request->input('address');
        $emp_prof->birthday   = $request->input('birthday');
        $emp_prof->memo       = $request->input('memo');
        $emp_prof->updated_at = now();
        $emp->save();
        $emp_prof->save();
    }

    public function delete(Int $id)
    {
        $emp = Employee::find($id);
        $emp->del_flg = 1;
        $emp->updated_at = now();
        $emp->save();

        return response()->json($emp,200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8mb4'],JSON_UNESCAPED_UNICODE);
    }

}
