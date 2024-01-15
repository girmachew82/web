@extends('app')

@section('content')
<div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
<div class="card">
        <div class="card-header card-bg-primary">
          <h3 class="card-title">Updating role</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-plus"  title="All">
            <a href="{{ url('admin/pages/role/index') }}"><i class="fas fa-list"></i>&nbsp;All</a>
            </button>
          </div>
        </div>
       <div class="card-body">
            <form action="{{ route('saveEditRole') }}" method="post">
                @csrf
               <input type="hidden" value="{{ $role->id }}" name="id">
                <label for="role">Role</label>
                <input type="text" class="form-control" name ='role' placeholder="Enter role name" required pattern="[a-zA-Z0-9\s]+" value='{{ $role->name }}'>
                <input type="submit" value="Update" class="btn btn-sm btn-primary mt-3">
            </form>
      </div>
      </div>
      <!-- /.card -->
      </div>

    </section>
</div>
@endsection

