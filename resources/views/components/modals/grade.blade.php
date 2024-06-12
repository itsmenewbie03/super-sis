{{-- Add Grade Modal --}}
<div class="modal fade" id="addGradeModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('grades.store') }}" novalidate>
                    @csrf
                    <div class="col-md-4">
                        <label for="subjectName" class="form-label">Student</label>
                        {{-- Dropdown --}}
                        <select class="form-select" id="subjectCode" required="" name="student_id">
                            <option selected="" disabled="" value="">Choose...</option>
                            @foreach ($students as $student)
                                @php
                                    $fullname = $student->first_name . ' ' . $student->last_name;
                                @endphp
                                <option value={{ $student->id }} @if (old('student_id') == $student->id) selected @endif>
                                    {{ $fullname }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a subject code.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="subjectName" class="form-label">Subject</label>
                        {{-- Dropdown --}}
                        <select class="form-select" id="subject_id" required="" name="subject_id">
                            <option selected="" disabled="" value="">Choose...</option>
                            @foreach ($subjects as $subject)
                                <option value={{ $subject->id }} @if (old('subject_id') == $subject->id) selected @endif>
                                    {{ $subject->subjectname }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a subject name.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="grade" class="form-label">Grade</label>
                        {{-- Dropdown --}}
                        <select class="form-select" id="grade" required="" name="grade">
                            <option selected="" disabled="" value="">Choose...</option>
                            @php
                                $valid_grades = [
                                    '1.00',
                                    '1.25',
                                    '1.50',
                                    '1.75',
                                    '2.00',
                                    '2.25',
                                    '2.50',
                                    '2.75',
                                    '3.00',
                                    '5.00',
                                    'INC',
                                    'DRP',
                                    'INV(FOR TESTING ONLY!)',
                                ];
                            @endphp
                            @foreach ($valid_grades as $grade)
                                <option value={{ $grade }} @if (old('grade') == $grade) selected @endif>
                                    {{ $grade }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please enter a grade.
                        </div>
                    </div>

                    {{-- <div class="col-md-4">
                        <label for="sectionCode" class="form-label">Section Code</label>
                        <input type="text" class="form-control" name="sectionCode" placeholder="ex. T321">
                    </div> --}}
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- INFO: Update Grade Modal (the ez way xD) --}}
@foreach ($grades as $grade)
    <div class="modal fade" id="editGradeModal{{ $grade->id }}" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Grade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="POST"
                        action="{{ route('grades.update', $grade->id) }}" novalidate>
                        @method('PATCH')
                        @csrf
                        <div class="col-md-4">
                            <label for="subjectName" class="form-label">Student</label>
                            {{-- Dropdown --}}
                            <select class="form-select" id="subjectCode" required="" name="student_id" disabled>
                                @php
                                    $fullname = $grade->student->first_name . ' ' . $grade->student->last_name;
                                @endphp
                                <option selected="" value="{{ $grade->student->id }}">{{ $fullname }}</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a subject code.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="subjectName" class="form-label">Subject</label>
                            {{-- Dropdown --}}
                            <select class="form-select" id="subject_id" required="" name="subject_id" disabled>
                                <option selected="" value="{{ $grade->subject->id }}">
                                    {{ $grade->subject->subjectname }}</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a subject name.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="grade" class="form-label">Grade</label>
                            {{-- Dropdown --}}
                            <select class="form-select" id="grade" required="" name="grade">
                                <option selected="" disabled="" value="">Choose...</option>
                                @php
                                    $valid_grades = [
                                        '1.00',
                                        '1.25',
                                        '1.50',
                                        '1.75',
                                        '2.00',
                                        '2.25',
                                        '2.50',
                                        '2.75',
                                        '3.00',
                                        '5.00',
                                        'INC',
                                        'DRP',
                                        'INV(FOR TESTING ONLY!)',
                                    ];
                                @endphp
                                @foreach ($valid_grades as $_grade)
                                    <option value="{{ $_grade }}"
                                        @if ($grade->grade == $_grade) selected @endif>
                                        {{ $_grade }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please enter a grade.
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                        <label for="sectionCode" class="form-label">Section Code</label>
                        <input type="text" class="form-control" name="sectionCode" placeholder="ex. T321">
                    </div> --}}
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- INFO: Delete Grade Modal (the ez way xD) --}}
@foreach ($grades as $grade)
    <div class="modal fade" id="deleteGradeModal{{ $grade->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Grade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this grade? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
