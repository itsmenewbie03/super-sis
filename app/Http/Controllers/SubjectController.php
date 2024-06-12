<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class SubjectController extends Controller
{
    public function index(): View|Factory
    {
        $subjects = Subject::all();
        
        return view("subjects.index", compact('subjects'));
    }

    public function add(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'subjectCode' => 'required|string|max:255',
                'subjectName' => 'required|string|max:255',
                'subjectDescription' => 'nullable|string|max:255',
            ]);

            if($validator->fails()){
                return redirect()->back()->with('error', 'Invalid input');
            }

            $validatorAlreadyExist = Validator::make($request->all(), [
                'subjectName' => 'unique:subjects,subjectname',
                'subjectCode' => 'unique:subjects,subjectcode',
            ]);

            if ($validatorAlreadyExist->fails()) {
                if ($validatorAlreadyExist->errors()->has('subjectName')) {
                    return redirect()->back()->with('error', 'Subject Name already exists.');
                }
                if ($validatorAlreadyExist->errors()->has('subjectCode')) {
                    return redirect()->back()->with('error', 'Subject Code already exists.');
                }
            }

            $subject = new Subject();
            $subject->subjectcode = $request->subjectCode;
            $subject->subjectname = $request->subjectName;
            $subject->description = $request->subjectDescription;
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
                'subjectCode' => 'required|string|max:255',
                'subjectName' => 'required|string|max:255',
                'subjectDescription' => 'nullable|string|max:255',
            ]);

            if($validator->fails()){
                return redirect()->back()->with('error', 'Invalid input');
            }

            //to ignore the current data that's already in the database
            $validatorAlreadyExist = Validator::make($request->all(), [
                'subjectCode' => [
                    Rule::unique('subjects', 'subjectcode')->ignore($subject->id),
                ],
                'subjectName' => [
                    Rule::unique('subjects', 'subjectname')->ignore($subject->id),
                ],
            ]);

            if ($validatorAlreadyExist->fails()) {
                if ($validatorAlreadyExist->errors()->has('subjectName')) {
                    return redirect()->back()->with('error', 'Subject Name already exists.');
                }
                if ($validatorAlreadyExist->errors()->has('subjectCode')) {
                    return redirect()->back()->with('error', 'Subject Code already exists.');
                }
            }

            $subject->subjectcode = $request->subjectCode;
            $subject->subjectname = $request->subjectName;
            $subject->description = $request->subjectDescription;
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
}
