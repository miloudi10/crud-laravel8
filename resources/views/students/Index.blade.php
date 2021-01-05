@extends('students.Layout')

@section('content')

<h2 class="mt-5 text-primary">Students List</h2>
<a class="btn btn-success" href="{{ route('students.create') }}"> Create New Student </a>  

<div class="uper">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Student Name</td>
            <td>Course</td>
            <td>Country</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($students as $student)
          <tr>
              <td>{{ $student->id}}</td>
              <td>{{ $student->Name}}</td>
              <td>{{ $student->Course}}</td>
              <td>{{ $student->Country}}</td>

              <td><a href="{{ route('students.edit', $student->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('students.destroy', $student->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
  @endsection