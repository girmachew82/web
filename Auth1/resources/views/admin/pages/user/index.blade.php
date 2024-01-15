@extends('app')

@section('content')
<div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-plus"  title="Add">
            <a href="{{ url('admin/pages/user/AddUser') }}"><i class="fas fa-plus"></i>Add</a>
            </button>
          </div>
        </div>
               <div class="card-body">
                    @if (Session('message'))
                    <div class="alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        {{ session('message') }}
                         </div>
                    @endif
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                  <div class="col-sm-12">
                   <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed table-sm table-hover" aria-describedby="example1_info">
                <thead>
                <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>President unit</th>
                        <th>Institute</th>
                        <th>College</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->givenname }}&nbsp;{{ $user->fathername }}</td>
                        <td>{{ $user->punit_name }}</td>
                        <td>{{ $user->institute_name }}</td>
                        <td>{{ $user->college_name }}</td>
                        <td>{{ $user->department_name }}</td>
                        <td>{{ $user->department_name }}</td>
                        <td><a href="{{ url('admin/pages/user/EditUser').'/'.$user->id.'/'.$user->educationlevel_id.'/'.$user->academictitle_id.'/'.$user->department_id .'/'.$user->college_id.'/'.$user->institute_id.'/'.$user->punit_id }}">
                            <i class="fa fa-edit"></i></a>&nbsp;

    <!-- Button trigger modal -->
    <a data-action="{{ route('deleteUser', $user->id) }}"
    data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
      <i class="fa fa-trash-alt"></i>
    </a>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action ="{{ route('deleteUser', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
      <div class="modal-body">
       Are you sure to delete? <br/>{{ $user->givenname }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
   </td>
</tr>
@endforeach

</tbody>
<tfoot>

</tfoot>
</table>
            </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">

            </div>

        </div>
    </div>
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
@push('dt-scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

@endpush
