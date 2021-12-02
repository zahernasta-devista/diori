@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
<link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.print.min.css')}}" rel="stylesheet" media='print'>
@endsection


@section('content')
				
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">List Calendar</h3>
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

@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/fullcalendar/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/fullcalendar.js') }}"></script>
@endsection
