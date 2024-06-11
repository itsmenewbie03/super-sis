<div class="card ">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Student</h5>
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
                        <th scope="col">Email</th>
                        <th scope="col">Grade</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John</td>
                        <td>Doe</td>
                        <td>Smith</td>
                        <td>John@hmail.com</td>
                        <td><span class="badge rounded-pill bg-success">1.00</span></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editModal">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                </tbody>
            </table>
        </div>
        <!-- End Table with hoverable rows -->
    </div>
</div>
