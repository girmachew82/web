@extends('app')

@section('content')
<div class="content-wrapper ">
    <section class="content-header">
      <div class="container-fluid">
        <div class="card">
        <div class="card-header">
          <h3 class="card-title">Adding academic title</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-plus"  title="Add">
            <a href="{{ url('admin/pages/academictitle/index') }}"><i class="fas fa-list"></i>&nbsp;All</a>
            </button>
          </div>
        </div>
       <div class="card-body">
            <form action="{{ route('addAcademicTitle') }}" method="post">
                @csrf
                <label for="academictitle">Academic title</label>
                <input type="text" class="form-control" name ='name' placeholder="Enter academic title" required pattern="[a-zA-Z\s]+">
                <input type="submit" value="Save" class="btn btn-sm btn-primary mt-3">
            </form>
      </div>
      </div>
      </div>
    </section>
</div>
      <!-- /.card -->

@endsection

