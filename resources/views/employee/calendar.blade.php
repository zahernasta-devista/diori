@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
<link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.print.min.css')}}" rel="stylesheet" media='print'>
<link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
@endsection
@section('page-header')
						<!-- PAGE-HEADER -->
							<div>
								<h1 class="page-title">Time Sheet</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Hours Clocked</a></li>
									<li class="breadcrumb-item active" aria-current="page">This Time Sheet Gives More Information About Your Work!</li>
								</ol>
							</div>
						<!-- PAGE-HEADER END -->
@endsection
@section('content')
						<!-- ROW OPEN -->
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">{{Auth::user()->name}}, This is Your Work Sheet!</h3>
									</div>
									<div class="card-body">
										<div id='calendar'></div>
									</div>
								</div>
							</div>
						</div>
						<!-- ROW CLOSED -->
					</div>
				</div>
				<!-- CONTAINER CLOSED -->
			</div>
			<!-- START MODAL -->
			<div id="myModal" class="modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit or Delete Time Log</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
							@csrf
								@if($errors->any())
									<div class="alert alert-primary">
										{{$errors->first()}}
									</div>
								@endif
							<div class="form-group-addon wrap-input100 validate-input">
								<input class="text-center input100 border-white bg-light" type="text" name="project" id="project" readonly>
								<span class="focus-input100"></span>
								<span class="symbol-input100"><i class="mdi mdi-note-plus" aria-hidden="true" >Project Name:</i></span>
							</div>
							<div class="form-group-addon wrap-input100 validate-input">
								<input class="text-center input100 border-white bg-light" type="number" id="time" min="1">
								<span class="focus-input100"></span>
								<span class="symbol-input100"><i class="mdi mdi-timer" aria-hidden="true" >Hours Worked : </i></span>
							</div>
							<div class="form-group-addon wrap-input100 validate-input">
								<textarea class="input100 border-white bg-light" type="text" name="comment" id="comment" rows="4" cols="50" ></textarea>
								<span class="focus-input100"></span>
								<span class="symbol-input100"><i class="mdi mdi-comment" aria-hidden="true" ></i></span>
							</div>
							<input id="id" name="id" type="hidden" class="input-lg"/>

						</div>
						<div class="modal-footer">
							<button id="editTimeLog" type="button" class="btn btn-primary" >Update Time Log</button>
							<button id="deleteTimeLog" type="button" class="btn btn-danger">Delete Time Log</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- END MODAL -->
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/fullcalendar/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script>
	let url = "{{route('timesheet-response')}}";
	let editUrl = "{{route('timesheet-update')}}";
	let deleteUrl = "{{route('timesheet-delete')}}";
	let csrfToken = "{{csrf_token()}}";
</script>
<script src="{{ URL::asset('assets/js/fullcalendar.js') }}"></script>
@endsection
