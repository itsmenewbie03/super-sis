<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class SubjectController extends Controller
{
    public function index(): View|Factory
    {
        return view("subjects.index");
    }

    public function add(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'subjectname' => 'string|max:255',
                'subjectcode' => 'string|max:255',
            ]);

            if($validator->fails()){
                return redirect()->back()->with('error', 'Invalid input');
            }

            //Dugang2 ra nako arun chuy
            $validatorAlreadyExist = Validator::make($request->all(), [
                'subjectname' => 'unique:subjects,subjectname',
                'subjectcode' => 'unique:subjects,subjectcode',
            ]);

            if($validatorAlreadyExist->fails()){
                return redirect()->back()->with('error', 'Already Exist!!');
            }

            $subject = new Subject();
            $subject->subject_name = $request->subjectname;
            $subject->subject_code = $request->subjectcode;
            $subject->save();

            return redirect()->back()->with('success', 'Subject added successfully');
        } catch (Exception $e) {
            //return $e;
            return redirect()->back()->with('error', 'Server Error(500)');
        }
    }

    public function edit(Request $request, $id)
    {   
        try {
            $subject = Subject::where('id', $id)->first();

            if(!$subject){
                return redirect()->back()->with('error', 'Subject not found!');
            }

            $validator = Validator::make($request->all(), [
                'subjectname' => 'string|max:255',
                'subjectcode' => 'string|max:255',
            ]);

            if($validator->fails()){
                return redirect()->back()->with('error', 'Invalid input');
            }

            //Dugang2 ra nako arun chuy
            $validatorAlreadyExist = Validator::make($request->all(), [
                'subjectname' => 'unique:subjects,subjectname',
                'subjectcode' => 'unique:subjects,subjectcode',
            ]);

            if($validatorAlreadyExist->fails()){
                return redirect()->back()->with('error', 'Already Exist!!');
            }

            $subject = new Subject();
            $subject->subject_name = $request->subjectname;
            $subject->subject_code = $request->subjectcode;
            $subject->save();

            return redirect()->back()->with('success', 'Subject updated successfully!');
        } catch (Exception $e) {
            //return $e;
            return redirect()->back()->with('error', 'Server Error(500)');
        }
    }

    function delete($id){
        try {
            $subject = Subject::where('id', $id)->first();

            if(!$subject){
                return redirect()->back()->with('error', 'Subject not found!');
            }

            $subject->delete();

            return redirect()->back()->with('success', 'Subject Deleted successfully!');
        } catch (Exception $e) {
            //return $e;
            return redirect()->back()->with('error', 'Server Error(500)');
        }
    }

    function search(Request $request){
        try{
            $subject = Subject::where('subjectcode', $request->search)
                        ->orWhere('subjectname', 'like', '%'.$request->search.'%')
                        ->all();
            if($subject){
                return view('subjects.index', compact('subject'));
            } else{
                //walay records e return
                return view('subjects.index', compact('subject'));
            }
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Server Error(500)');
        }
    }
}
