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

    public function post(Request $request): void
    {
        dd('bisakol!');
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student): void
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
