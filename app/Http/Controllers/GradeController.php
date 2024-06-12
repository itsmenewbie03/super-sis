<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory
    {
        $students = Student::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        return view("grades.index", ['students' => $students, 'subjects' => $subjects,'grades' => $grades]);
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
    public function store(GradeRequest $request): RedirectResponse
    {
        $request->validated();
        $created = Grade::create($request->all());
        if($created) {
            return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
        }
        return redirect()->route('grades.index')->with('error', 'Failed to add grade.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade): RedirectResponse
    {
        $grade->grade = $request->input("grade");
        $res = $grade->save();
        if ($res) {
            return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
        }
        return redirect()->route('grades.index')->with('error', 'Failed to update grade.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade): RedirectResponse
    {
        $isDeleted = $grade->delete();
        if ($isDeleted) {
            return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
        }
        return redirect()->route('grades.index')->with('error', 'Failed to delete grade.');
    }
}
