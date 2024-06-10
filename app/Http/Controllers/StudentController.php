<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory
    {
        return view("students.index");
    }

    public function post(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students',
            'phone_number' => 'nullable|unique:students',
            'address' => 'required|string',
            'age' => 'required|numeric'
        ]);

        $student = Student::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'age' => $request->age,
        ]);

        if (!$student) {
            return redirect()->route('students.index')->with("error", "Error adding student!");
        } else {
            //Successful
            return redirect(route('students.index'))->with("success", "Student added successfully!");
        }
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $validatedData = $request->validate([
            'first_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'nullable|email|unique:students',
            'phone_number' => 'nullable|unique:students',
            'address' => 'nullable|string',
            'age' => 'nullable|numeric'
        ]);

        // Remove fields with null values from the validated data
        $validatedData = array_filter($validatedData, function ($value) {
            return !is_null($value);
        });

        try {
            // Attempt to update the student with the validated data
            $student->update($validatedData);
    
            // Success message
            return redirect()->route('students.index')->with('success', 'Student updated successfully!');
        } catch (\Exception $e) {
            // Error message
            return redirect()->back()->with('error', 'Failed to update student. Please try again later.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): void
    {
        //
    }
}
