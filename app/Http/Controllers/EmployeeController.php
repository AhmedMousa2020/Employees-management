<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeGroup;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::paginate(5);
        return view('employee.index',['employees'=>$employees]);
    }

    public function create(){

        $employee = new Employee();
        return view('employee.create',['employee'=>$employee]);
    }

    public function store(Request $request)
    {
       
        $employee = new Employee();
            
        $employee->name =  $request->name;
        $employee->role =  $request->role;
        $employee->email =  $request->email;
        $employee->group_id =  $request->group;
        $employee->save();


        $employee_group = new EmployeeGroup();
        $employee_group->employee_id = $employee->id;
        $employee_group->group_id = $request->group;
        $employee_group->save();

        return redirect('employees')->with('status', 'Success: Employee Created');
    }

    public function edit($id){
        $employee = Employee::where('id',$id)->first();
        return view('employee.create',['employee'=>$employee]);
    }
    public function update(Request $request,$id){

        $employee = Employee::find($id);
        $group_id = $employee->group_id;   
        $employee->name =  $request->name;
        $employee->role =  $request->role;
        $employee->email =  $request->email;
        $employee->group_id =  $request->group;
        $employee->save();


        $employee_group = EmployeeGroup::where('employee_id',$employee->id)->where('group_id',$group_id)->first();
        $employee_group->employee_id = $employee->id;
        $employee_group->group_id = $request->group;
        $employee_group->save();

        return redirect('employees')->with('status', 'Success: Employee Created');
    }
    public function destroy($id){
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('employees')->with('status', 'Success: Employee Deleted');
    }
}
