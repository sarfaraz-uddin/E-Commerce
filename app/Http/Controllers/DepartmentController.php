<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\Notification;

class DepartmentController extends Controller
{
    //
    public function addDepartment(Request $req){
        $validateData=$req->validate([
            'deptname'=>'required|unique:departments,departmentName',
            'departmentImage'=>'required',
        ],
    );

        $image=$req->file('departmentImage');
        $response=$image->store('dbimages','public');
        $department=new Department();
        $department->departmentName=Str::title($req->deptname);
        $department->departmentImage=$response;
        $department->save();

        return back()->with('success','Department created successfully');
    }
    public function getDepartment(){
        $notification=Notification::count();
        $notifications=Notification::all();
        $departments=Department::all();
        return view('admin.departments',compact('departments','notification','notifications'));
    }
    public function getDepartmentView($id){
        $department = Department::findOrFail($id);
        $latestproducts=Products::orderBy('created_at','DESC')->get()->take(8);
        $departmentsort = $department->category;
        $productsArray = [];
        foreach($departmentsort as $check){
            $products=$check->products;
            foreach($products as $product){
                array_push($productsArray, $product);
            }
        }
        $departments=Department::all();
        return view('layout.filterdepartments',compact('productsArray','departments','latestproducts'));
    }
    public function editDepartment(Request $req){
        $deparment=Department::find($req->departmentid);
        $image=$req->file('editdepartmentImage');
        $response=$image->store('dbimages','public');
        $deparment->departmentName=$req->departmentname;
        $deparment->departmentImage=$response;
        $deparment->save();
        return back()->with('edited','f');
    }
    public function delDeparment(Request $req){
        $deparment=Department::find($req->idpass);
        $deparment->delete();
        return back()->with('deldept','Deleted successfully');
    }
}
