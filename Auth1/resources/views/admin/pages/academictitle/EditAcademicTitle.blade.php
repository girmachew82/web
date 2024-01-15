@extends('app')

@section('content')
<div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
         <div class="card">
        <div class="card-header card-bg-primary">
          <h3 class="card-title">Updating academic title</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-plus"  title="All">
            <a href="{{ route('admin.pages.academictitle.index') }}"><i class="fas fa-list"></i>&nbsp;All</a>
            </button>
          </div>
        </div>
       <div class="card-body">
            <form action="{{ route('saveEditAcademicTitle') }}" method="post">
                @csrf
               <input type="hidden" value="{{ $AcademicTitle->id }}" name="id">
                <label for="academictitle">Academic title</label>
                <input type="text" class="form-control" name ='name' placeholder="Enter academic title" required pattern="[a-zA-Z\s]+" value='{{ $AcademicTitle->name }}'>
                <input type="submit" value="Update" class="btn btn-sm btn-primary mt-3">
            </form>
      </div>
      </div>
      <!-- /.card -->
      </div>
    </section>
@endsection

