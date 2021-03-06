@extends('students.Layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Add Students
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
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
              @csrf
              <label for="country_name">Student Name:</label>
              <input type="text" class="form-control" name="Name"/>
          </div>
          <div class="form-group">
              <label for="cases">Course :</label>
              <input type="text" class="form-control" name="Course"/>
          </div>
          <div class="form-group">
            <label for="cases">Country :</label>
            <input type="text" class="form-control" name="Country"/>
        </div>
          <button type="submit" class="btn btn-primary">Add Student</button>
      </form>
  </div>
</div>
@endsection

