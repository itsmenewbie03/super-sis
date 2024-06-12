<div class="card ">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Grades</h5>
        </div>
        <!-- Table with hoverable rows -->
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Grade</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grades as $grade)
                        <tr>
                            <td>{{ $grade->id }}</td>
                            <td>{{ $grade->student->first_name }}</td>
                            <td>{{ $grade->student->middle_name }}</td>
                            <td>{{ $grade->student->last_name }}</td>
                            <td>{{ $grade->subject->subjectname }}</td>
                            @php
                                // NOTE: ocd stuff, make badge color based on grade
                                $bad_grades = ['5.00', 'INC', 'DRP', 'INV(FOR TESTING ONLY!)'];
                                $warning_grades = ['2.75', '3.00'];
                                $badge_color = '';
                                if (in_array($grade->grade, $bad_grades)) {
                                    $badge_color = 'danger';
                                } elseif (in_array($grade->grade, $warning_grades)) {
                                    $badge_color = 'warning';
                                } else {
                                    $badge_color = 'success';
                                }
                            @endphp
                            <td><span class="badge rounded-pill bg-{{ $badge_color }}">{{ $grade->grade }}</span></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editGradeModal{{ $grade->id }}">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteGradeModal{{ $grade->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table with hoverable rows -->
    </div>
</div>
