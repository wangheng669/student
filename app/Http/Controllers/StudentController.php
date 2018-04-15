<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class StudentController extends Controller
{
    public function index(){
        $students=Student::paginate(10);
        return view('student.index',[
            'students'=>$students
        ]);
    }
    public function create(Request $request){
        $student = new Student();
        if($request->isMethod('POST')){
            // $request->validate([
            //     'student.name'=>'required',
            //     'student.age'=>'required|integer|min:2|max:100',
            //     'student.sex'=>'required|integer',
            // ],[
            //     'required'=>':attribute不能为空',
            //     'integer'=>':attribute必须为整数',
            //     'min'=>':attribute超出最小值',
            //     'max'=>':attribute超出最大值',
            // ],[
            //     'student.age'=>'年龄',
            //     'student.sex'=>'性别',
            //     'student.name'=>'姓名',
            // ]);
            $validator= \Validator::make($request->input(),[
                'student.name'=>'required',
                'student.age'=>'required|integer|min:2|max:100',
                'student.sex'=>'required|integer',
            ],[
                'required'=>':attribute不能为空',
                'integer'=>':attribute必须为整数',
                'min'=>':attribute超出最小值',
                'max'=>':attribute超出最大值',
            ],[
                'student.age'=>'年龄',
                'student.sex'=>'性别',
                'student.name'=>'姓名',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data=$request->input('student');
            if(Student::create($data)){
                return redirect('student/index')->with('success','添加成功');
            }else{
                return redirect()->back()->with('error','添加失败');
            }
        }
        return view('student.create',[
            'student'=>$student
        ]);
    }
    //更新操作
    public function update(Request $request,$id){
        $student = Student::find($id);
        if($request->isMethod('post')){
            $validator= \Validator::make($request->input(),[
                'student.name'=>'required',
                'student.age'=>'required|integer|min:2|max:100',
                'student.sex'=>'required|integer',
            ],[
                'required'=>':attribute不能为空',
                'integer'=>':attribute必须为整数',
                'min'=>':attribute超出最小值',
                'max'=>':attribute超出最大值',
            ],[
                'student.age'=>'年龄',
                'student.sex'=>'性别',
                'student.name'=>'姓名',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $request->input('student');
            $student->name=$data['name'];
            $student->sex=$data['sex'];
            $student->age=$data['age'];
            if($student->save()){
                return redirect('student/index')->with('success','修改成功');
            }else{
                return redirect()->back()->with('error','修改失败');
            }
        }
        return view('student.update',[
            'student'=>$student
        ]);
    }
    //详情操作
    public function detail($id){
        $student = Student::find($id);
        return view('Student.detail',[
            'student'=>$student,
        ]);
    }
    //删除操作
    public function delete($id){
        $student=Student::find($id);
        if($student->delete($id)){
            return redirect('student/index')->with('success','删除成功');
        }else{
            return redirect()->back()->with('error','删除失败');
        }
    }
}
