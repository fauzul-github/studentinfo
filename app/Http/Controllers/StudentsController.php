<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Datatables;


class StudentsController extends Controller
{
    public function index(){
        $total_student = Student::paginate(5);
        
        return view('welcome', compact('total_student'));
    }
   
    
    
        public function insert(Request $request){
        
        if($request->get('button_action')== "insert"){
            
        $student_info = new Student([
                    'name'    =>  $request->get('name'),
                    'mobile_number'   =>  $request->get('mobile_number'),
                    'gender'    =>  $request->get('gender'),
                    'address'    =>  $request->get('address'),
                    'email_address'    =>  $request->get('email_address')
                ]);
        
        $student_info->save();
        
        
        //$success_output = '<tr><td>'.$request->get('name').'</td><td>'.$request->get('mobile_number').'</td><td>'.$request->get('gender').'</td><td>'.$request->get('address').'</td><td>'.$request->get('email_address').'</td><td><a href="javascript:void(0)">Download</a></td><td></td><td><input type="hidden" name="student_id" value="'.$student_info->id.'"><button type="button" name="edit" class="btn btn-success btn-sm edit_data">Edit</button>&nbsp;<button type="button" name="delete" id="" class="btn btn-delete btn-sm">Delete</button></td></tr>';
        echo json_encode('Data Inserted');
        }
        else if($request->get('button_action')== "Edit"){
            //$hello = $request->get('st_id');
            
            $student_info = Student::find($request->get('st_id'));
            $student_info->name = $request->get('name');
            $student_info->mobile_number = $request->get('mobile_number');
            $student_info->gender = $request->get('gender');
            $student_info->address = $request->get('address');
            $student_info->email_address = $request->get('email_address');
            $student_info->save();
            echo json_encode('Edited');
            
            
            //return false;
            //echo json_encode($student_info);
           
        }
        
  
    }
    
    public function edit(Request $request){
        //$edit = $request->get('button_action');
        $id = $request->get('id');
        $single_student_value = Student::find($id);
        echo json_encode($single_student_value);
    }
    
    public function delete(Request $request){
        $id = $request->get('id');
        $student = Student::find($id);
        $student->delete( $request->all() );
        echo json_encode('Deleted');
    }
}
