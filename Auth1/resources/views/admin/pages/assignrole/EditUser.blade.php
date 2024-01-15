@extends('app')
@section('content')
<div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
<div class="card">
        <div class="card-header card-bg-primary">
          <h3 class="card-title">Updating Use information</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-plus"  title="All">
            <a href="{{ url('admin/pages/user/index') }}"><i class="fas fa-list"></i>&nbsp;All</a>
            </button>
          </div>
        </div>
       <div class="card-body">
            <form action="{{ route('saveUser') }}" method="post">
                @csrf
                <label for="title">Title</label>
                <select name="title" id="" class="form-control">
                    <option value="{{ $user->title }}">{{ $user->title }}</option>
                    <option value="">Select title</option>
                    <option value="Ato">Ato</option>
                    <option value="W/r">W/r</option>
                    <option value="Dr.">Dr.</option>
                </select>

                <label for="givenname">Given name</label>
                <input type="text" name='givenname' class="form-control" value="{{ $user->givenname }}">

                <label for="fathername">Father name</label>
                <input type="text" name='fathername' class="form-control" value="{{ $user->fathername }}">

                <label for="grandfather">Grandfather name</label>
                <input type="text" name='grandfather' class="form-control" value="{{ $user->grandfather }}">

                <label for="gender">Gender</label>
                <select name="gender" id="" class="form-control">
                    <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                    <option value="">Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label for="educationlevel_id">Education level</label>
                <select name="educationlevel_id" id="" class="form-control">
                    <option value="{{ $curreducationlevel->id }}">{{ $curreducationlevel->name }}</option>
                    <option value="">Select education level</option>
                        @foreach ($educationleveles as $educationlevel )
                            <option value="{{ $educationlevel->id }}">{{ $educationlevel->name }}</option>
                        @endforeach
                </select>

                <label for="academictitle">Academic title </label>
                <select name="academictitle_id" id="" class="form-control">
                    <option value="{{ $curracademictitle->id }}">{{ $curracademictitle->name }}</option>
                    <option value="">Select academic title</option>
                    @foreach ($academictitles as $academictitle )
                    <option value="{{ $academictitle->id }}">{{ $academictitle->name }}</option>
                @endforeach
                </select>

                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                <label for="punit">President Unit</label>
                <select name="punit_id" id="punit-dd" class="form-control">
                    <option value="{{ $currpunit->id}}">{{ $currpunit->name }}</option>
                    <option value="">Select president unit</option>
                    @foreach ($punits as $punit )
                        <option value="{{ $punit->id }}">{{ $punit->name }}</option>
                    @endforeach
                </select>

                <label for="institute">Institute</label>
                <select name="institute_id" id="" class="form-control">
                    <option value="{{ $currinstitute->id}}">{{ $currinstitute->name }}</option>
                    <option value="">Select institute</option>
                    @foreach ($institutes as $institute )
                        <option value="{{ $institute->id }}">{{ $institute->name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="college">College/Directorate</label>
                <select class="form-control" name="college_id" id="college-dd">
                    <option value="{{ $currcollege->id}}">{{ $currcollege->name }}</option>
                    <option value="">Select president unit first</option>

                </select>

               <input type="hidden"  value="{{ $user->id }}" name="id">
                <label for="department/teamleader">Department/Team leader</label>
                <select class="form-control" name="department_id" id="dept-dd">
                <option value="{{ $currdepartment->id}}">{{ $currdepartment->name }}</option>
                <option value="">Select department/team</option>
                </select>
                <input type="submit" value="Update" class="btn btn-sm btn-primary mt-3">
            </form>
      </div>
      </div>
      <!-- /.card -->
      </div>
    </section>
</div>
@endsection

@push('dd_User')
<script>
    $(document).ready(function () {
        $('#punit-dd').on('change', function () {
            var punitID = this.value;
            $("#college-dd").html('');
            $.ajax({
                url: "{{url('admin/pages/user/fetchCollege')}}",
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
        $('#college-dd').on('change', function () {
            var collegeID = this.value;
            $("#dept-dd").html('');
            $.ajax({
                url: "{{url('admin/pages/user/fetchDepartment')}}",
                type: "POST",
                data: {
                    college_id: collegeID,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#dept-dd').html('<option value="">Select Department/Team</option>');
                    $.each(result.departments, function (key, value) {
                        $("#dept-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>

@endpush
