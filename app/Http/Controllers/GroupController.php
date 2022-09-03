<?php

namespace App\Http\Controllers;

use App\Models\EmployeeGroup;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $groups=Group::paginate(5);
        return view('group.index',['groups'=>$groups]);
    }

    public function show($group_id){
        $group = Group::where('id',$group_id)->first();
        return view('group.show',['group'=>$group]);
    }
    public function create(){
        $group = new Group();
        return view('group.create',['group'=>$group]);
    }
    public function store(Request $request)
    {
       
        $group = new Group();
            
        $group->name =  $request->name;
        $group->description =  $request->description;
        $group->save();

        $assigne_numbers = $request->assigned;
        $this->storeEmployeesGroupRelationship($assigne_numbers,$group->id); //Single Responsibility Principle
        

        return redirect('groups')->with('status', 'Success: group Created');
    }

    public function storeEmployeesGroupRelationship($assigne_numbers,$group_id){
        if(is_array($assigne_numbers)){
            foreach($assigne_numbers as $number){
                $check_employee =EmployeeGroup::where('employee_id',$number)->where('group_id',$group_id)->first(); 
                if(empty($check_employee)){
                    $employee_group = new EmployeeGroup();
                    $employee_group->employee_id = $number;
                    $employee_group->group_id = $group_id;
                    $employee_group->save();
                }
            }
        }
    }

    public function edit($id){
        $group = Group::where('id',$id)->first();
        return view('group.create',['group'=>$group]);
    }

    public function update(Request $request,$id){

        $group = group::find($id);
        $group->name =  $request->name;
        $group->description =  $request->description;
        $group->save();

        return redirect('groups')->with('status', 'Success: group Updated');
    }

    public function destroy($id){
        $group = group::find($id);
        $group->delete();
        return redirect('groups')->with('status', 'Success: group Deleted');
    }
}
