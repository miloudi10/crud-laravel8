@extends('students.Layout')

@section('content')

<div class="card uper">
    <div class="card-header">
      Edit Student 
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" action="{{ route('students.update', $student->id ) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="country_name">Student Name:</label>
                <input type="text" class="form-control" name="Name" value="{{ $student->Name }}"/>
            </div>
            <div class="form-group">
                <label for="cases">Course :</label>
                <input type="text" class="form-control" name="Course" value="{{ $student->Course }}"/>
            </div>
            <div class="form-group">
                <label for="cases">Country :</label>
                <input type="text" class="form-control" name="Country" value="{{ $student->Country }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
  </div>
  @endsection