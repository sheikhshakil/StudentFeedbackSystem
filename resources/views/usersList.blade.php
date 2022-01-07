@include('partials/header')

<section class="container">
    {{-- students table --}}
    <div id="sdata" class="my-shadow my-3">
        <div class="card-header light-bg-purple p-3">
            <b>Students list</b>
        </div>
        <div class="card-body extra-light-bg-green p-2">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped my-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Student ID</th>
                            <th>Full name</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Email</th>
                            <th>Reg. date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$student->std_id}}</td>
                                <td>{{$student->fullName}}</td>
                                <td>{{$student->dept}}</td>
                                <td>{{$student->semester}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->regDate}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="/deleteUser?type=student&id={{$student->std_id}}">Delete user</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- teachers table --}}
    <div id="tdata" class="my-shadow mb-3">
        <div class="card-header p-3 light-bg">
            <b>Teachers list</b>
        </div>
        <div class="card-body extra-light-bg-green p-2">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped my-0">
                    <thead class="table-danger">
                        <tr>
                            <th>Teacher ID</th>
                            <th>Full name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Reg. date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->t_id}}</td>
                                <td>{{$teacher->fullName}}</td>
                                <td>{{$teacher->dept}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->regDate}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="/deleteUser?type=teacher&id={{$teacher->t_id}}">Delete user</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@include('partials/footer')