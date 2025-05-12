<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mb-3">
                    <h2>Students List</h2>
                    <a class="btn btn-success" href="{{ route('students.create') }}">Add New Student</a>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th width="280px">Action</th>
                    </tr>
                    @if ($students->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-danger">No students found.</td>
                    </tr>
                    @endif
                    {{-- Loop through the students and display them --}}
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->year }}</td>
                        <td>{{ $student->section }}</td>
                        <td>
                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
