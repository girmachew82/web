@extends('app')

@section('content')
<div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Adding new education level</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-plus"  title="Add">
            <a href="{{ url('admin/pages/educationlevel/index') }}"><i class="fas fa-list"></i>&nbsp;All</a>
            </button>
          </div>
        </div>
       <div class="card-body">
            <form action="{{ route('addEducationLevel') }}" method="post">
                @csrf
                <label for="education level">Education Level</label>
                <input type="text" class="form-control" name ='name' placeholder="Enter education level" required pattern="[a-zA-Z0-9\s]+">
                <input type="submit" value="Save" class="btn btn-sm btn-primary mt-3">
            </form>
      </div>
      </div>
      <!-- /.card -->
      </div>
    </section>
</div>
@endsection

