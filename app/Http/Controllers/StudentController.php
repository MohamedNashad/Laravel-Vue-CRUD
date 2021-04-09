<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function save_student()
    {
        // return 'test';
        // return request();
        $student = new Student;
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone = request()->phone;
        $student->save();
        return 'ok';
    }

    public function all_students()
    {
        $students = Student::paginate(5);
        return response()->json($students);
    }

    public function edit_student($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }

    public function update_student()
    {
        // return 'test';
        $student = Student::find(request()->id);
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone = request()->phone;
        $student->update();
        return 'ok';
    }

    public function delete_student($id)
    {
        // return $id;
        $student = Student::find($id)->delete();
        return 'ok';
    }
}
