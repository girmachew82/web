@extends('app')

@section('content')
<div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Adding college/directorate</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-plus"  title="Add">
            <a href="{{ url('admin/pages/college/index') }}"><i class="fas fa-list"></i>&nbsp;All</a>
            </button>
          </div>
        </div>
       <div class="card-body">
            <form action="{{ route('addCollege') }}" method="post">
                @csrf
                <label for="punit">President Unit</label>
                <select name="punit_id" id="" class="form-control">
                    <option value="">Select president unit</option>
                    @foreach ($punits as $punit )
                        <option value="{{ $punit->id }}">{{ $punit->name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="institute">Institute</label>
                <select name="institute_id" id="" class="form-control">
                    <option value="">Select institute</option>
                    @foreach ($institutes as $institute )
                        <option value="{{ $institute->id }}">{{ $institute->name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="college">College</label>
                <input type="text" class="form-control" name ='name' placeholder="Enter college/directorat" required pattern="[a-zA-Z\s]+">
                <input type="submit" value="Save" class="btn btn-sm btn-primary mt-3">
            </form>
      </div>
      </div>
      <!-- /.card -->
      </div>
    </section>
</div>
@endsection

