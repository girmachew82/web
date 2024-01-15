@extends('app', [
    'class' => '',
    'elementActive' => 'home'
])
@section('content')
<div class="content-wrapper ">
<section class="content-header">
<div class="container-fluid">
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Home</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          this is my home page
            <br/>
            {{-- @if(auth()->user()->roles)
            @foreach ($roles as $role)
                    {{ $role }}
            @endforeach
            @endif --}}
            @if(session()->has('user'))
                {{ session()->get('user')['givenname']}}
            @else
                No user session
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
</section>
</div>
@endsection
