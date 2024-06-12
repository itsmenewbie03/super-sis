{{-- Add Subject Modal --}}
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="POST" action="{{route('subjects.post')}}" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="subjectName" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" name="subjectName" placeholder="Name of the subject" required>
                        <div class="invalid-feedback">
                            Please enter a subject name.
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="subjectCode" class="form-label">Subject Code</label>
                        <input type="text" class="form-control" name="subjectCode" placeholder="ex. IT123" required>
                        <div class="invalid-feedback">
                            Please enter a subject code.
                        </div>
                    </div>
                    
                   
                    <div class="col-md-12">
                        <label for="subjectDescription" class="form-label">Description</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" style="height: 100px" name="subjectDescription" id="subjectDescription" placeholder="ex. This is a description of a subject."></textarea>
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

@foreach ($subjects as $subjectsData)
    {{-- Update Subject Modal --}}
    <div class="modal fade" id="editModal{{$subjectsData->id}}" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="POST" action="{{route('subjects.update', ['id' => $subjectsData->id])}}" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="subjectName" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" name="subjectName" placeholder="Name of the subject" value="{{$subjectsData->subjectname}}" required>
                            <div class="invalid-feedback">
                                Please enter a subject name.
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="subjectCode" class="form-label">Subject Code</label>
                            <input type="text" class="form-control" name="subjectCode" placeholder="ex. IT123" value="{{$subjectsData->subjectcode}}" required>
                            <div class="invalid-feedback">
                                Please enter a subject code.
                            </div>
                        </div>
                        
                    
                        <div class="col-md-12">
                            <label for="subjectDescription" class="form-label">Description</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" style="height: 100px" name="subjectDescription" id="subjectDescription" placeholder="ex. This is a description of a subject."></textarea>
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

    {{-- Delete Subject Modal --}}
    <div class="modal fade" id="deleteModal{{$subjectsData->id}}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Subject? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{route('subjects.delete', ['id' => $subjectsData->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach