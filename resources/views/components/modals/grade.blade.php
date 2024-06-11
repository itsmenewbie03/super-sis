{{-- Edit Grade Modal --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="POST" novalidate>
                    @csrf
                    <div class="col-md-4">
                        <label for="subjectName" class="form-label">Subject Name</label>
                        {{-- Dropdown --}}
                        <select class="form-select" id="subjectName" required="" name="subjectName">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="Math">Math</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="Filipino">Filipino</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a subject name.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="subjectName" class="form-label">Subject Code</label>
                        {{-- Dropdown --}}
                        <select class="form-select" id="subjectCode" required="" name="subjectCode">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="IT123">IT123</option>
                            <option value="IT124">IT124</option>
                            <option value="IT125">IT125</option>
                            <option value="IT126">IT126</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a subject code.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="grade" class="form-label">Grade</label>
                        {{-- Dropdown --}}
                        <select class="form-select" id="grade" required="" name="grade">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="1.00">1.00</option>
                            <option value="1.25">1.25</option>
                            <option value="1.50">1.50</option>
                            <option value="1.75">1.75</option>
                            <option value="2.00">2.00</option>
                            <option value="2.25">2.25</option>
                            <option value="2.50">2.50</option>
                            <option value="2.75">2.75</option>
                            <option value="3.00">3.00</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
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

