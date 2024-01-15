@extends('app')
@section('content')
<div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
<div class="card">
        <div class="card-header card-bg-primary">
          <h3 class="card-title">Updating college/directorate</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-plus"  title="All">
            <a href="{{ url('admin/pages/college/index') }}"><i class="fas fa-list"></i>&nbsp;All</a>
            </button>
          </div>
        </div>
       <div class="card-body">
            <form action="{{ route('saveEditCollege') }}" method="post">
                @csrf
                <label for="punit">President Unit</label>
                <select name="punit_id" id="" class="form-control">
                    <option value="{{ $currpunit->id}}">{{ $currpunit->name }}</option>
                    <option value="">Select president unit</option>
                    @foreach ($punits as $punit )
                        <option value="{{ $punit->id }}">{{ $punit->name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="institute">Institute</label>
                <select name="institute_id" id="" class="form-control">
                    <option value="{{ $currinstitute->id}}">{{ $currinstitute->name }}</option>
                    <option value="">Select institute</option>
                    @foreach ($institutes as $institute )
                        <option value="{{ $institute->id }}">{{ $institute->name }}</option>
                    @endforeach
                </select>
                <br>
               <input type="hidden" value="{{ $college->id }}" name="id">
                <label for="college/director">College/Director</label>
                <input type="text" class="form-control" name ='name' placeholder="Enter college/director name" required pattern="[a-zA-Z\s]+" value='{{ $college->name }}'>
                <input type="submit" value="Update" class="btn btn-sm btn-primary mt-3">
            </form>
      </div>
      </div>
      <!-- /.card -->
      </div>
    </section>
</div>
@endsection

