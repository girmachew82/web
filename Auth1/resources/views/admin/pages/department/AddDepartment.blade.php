@extends('app')

@section('content')
<div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Adding department/team leader</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-plus"  title="Add">
            <a href="{{ url('admin/pages/department/index') }}"><i class="fas fa-list"></i>&nbsp;All</a>
            </button>
          </div>
        </div>
       <div class="card-body">
            <form action="{{ route('addDepartment') }}" method="post">
                @csrf
                <label for="punit">President Unit</label>
                <select name="punit_id" id="punit-dd" class="form-control">
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
                <label for="college/directorate">College/Directorate</label>
                <select name="college_id" id="college-dd" class="form-control">
                    <option value="">Select president unit first</option>
                </select>
                <label for="department/teamleader">Department/Team leader</label>
                <input type="text" class="form-control" name ='name' placeholder="Enter department/team leader" required pattern="[a-zA-Z\s]+">
                <input type="submit" value="Save" class="btn btn-sm btn-primary mt-3">
            </form>
      </div>
      </div>
      <!-- /.card -->
      </div>

    </section>
</div>
@endsection
@push('cascading')
<script>
    $(document).ready(function () {
        $('#punit-dd').on('change', function () {
            var punitID = this.value;
            $("#college-dd").html('');
            $.ajax({
                url: "{{url('admin/pages/department/fetchCollege')}}",
                type: "POST",
                data: {
                    punit_id: punitID,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#college-dd').html('<option value="">Select College/Directorate</option>');
                    $.each(result.colleges, function (key, value) {
                        $("#college-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                }
            });
        });

    });
</script>

@endpush
