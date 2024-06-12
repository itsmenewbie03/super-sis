{{-- Add Student Modal --}}
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" action="{{route('students.post')}}" method="POST" novalidate>
                    @csrf
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                        <div class="invalid-feedback">
                            Please enter your first name.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" required>
                        <div class="invalid-feedback">
                            Please enter your middle name.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                        <div class="invalid-feedback">
                            Please enter your last name.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="invalid-feedback">
                            Please enter your email.
                        </div> 
                    </div>

                    
                    <div class="col-md-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="Phone" required>
                        <div class="invalid-feedback">
                            Please enter your phone number.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" placeholder="Age" required>
                        <div class="invalid-feedback">
                            Please enter your age.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                        <div class="invalid-feedback">
                            Please enter your address.
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

{{-- Update Student Modal --}}
@foreach ($students as $student)
<div class="modal fade" id="editModal{{$student->id}}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" action="{{route('students.update', ['id' => $student->id])}}" method="POST" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="{{$student->first_name}}" >
                        <div class="invalid-feedback">
                            Please enter your first name.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" placeholder="{{$student->middle_name}}" >
                        <div class="invalid-feedback">
                            Please enter your middle name.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="{{$student->last_name}}" >
                        <div class="invalid-feedback">
                            Please enter your last name.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="{{$student->email}}" >
                        <div class="invalid-feedback">
                            Please enter your email.
                        </div> 
                    </div>

                    
                    <div class="col-md-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="{{$student->phone_number}}" >
                        <div class="invalid-feedback">
                            Please enter your phone number.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" placeholder="{{$student->age}}" >
                        <div class="invalid-feedback">
                            Please enter your age.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="{{$student->address}}" >
                        <div class="invalid-feedback">
                            Please enter your address.
                        </div>
                    </div>
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


{{-- Delete Student Modal --}}
@foreach ($students as $student)
    <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this student? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{route('students.delete', ['id' => $student->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

