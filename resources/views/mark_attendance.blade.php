@extends('layout')

@section('active_mark')
active
@stop

@section('body')
<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<h1 class="app-page-title">Mark Attendance</h1>

			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body p-3 p-lg-4">

						@if(session('success'))
						<div class="alert alert-success fw-bold">
							{{ session('success') }}
						</div>
						@endif

						@if (session('error'))
						<div class="alert alert-danger fw-bold">
							{{ session('error') }}
						</div>
						@endif

						<h3 class="mb-3">Mark Attendance</h3>
						<div class="row gx-5 gy-3">
							<div class="col-12 col-lg-12">
								<form class="settings-form" method="POST" action="{{route('submit_attendance')}}">
									@csrf
									<div class="mb-3">
										<label for="setting-input-1" class="form-label"> Select Date<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
													<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
													<circle cx="8" cy="4.5" r="1" />
												</svg></span></label>
												<input type="date" name="date" class="form-control" id="setting-input-1" value="Lorem Ipsum Ltd." required>

									</div>
									<br />
									<hr>

									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left">
											<thead>
												<tr>
													<th class="cell">Number</th>
													<th class="cell">Staff Name</th>
													<th class="cell">Role</th>
													<th class="cell">Status</th>
													<th class="cell">Actions</th>

												</tr>
											</thead>
											<tbody>

												@if(count($data) > 0)
												@foreach($data as $staff)
												<tr>

													<td class="cell">{{$staff->id}}</td>
													<td class="cell"><span class="truncate">{{ $staff->full_name }}</span></td>
													<td class="cell">{{ $staff->role }}</td>
													<td class="cell"><span class="badge bg-success">Available</span></td>
													<td class="cell">
														<div class="form-check form-check-inline">

															<input class="form-check-input" type="radio" name="{{$staff->id}}" id="exampleRadios1" value="Present" required>
															<label class="form-check-label" for="{{$staff->id}}">
																Present
															</label>


														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="{{$staff->id}}" id="exampleRadios1" value="Absent" >
															<label class="form-check-label" for="{{$staff->id}}">
																Absent
															</label>
														</div>

													</td>
												</tr>
												@endforeach
												@endif



											</tbody>
										</table>
										<div class="mt-3">
											<button type="submit" class="btn app-btn-primary">Save Changes</button>
										</div>
									</div>

								</form>


							</div><!--//col-->
							<!--//col-->
						</div><!--//row-->
					</div><!--//app-card-body-->

				</div><!--//inner-->
			</div><!--//app-card-->

			<!--//row-->

		</div><!--//container-fluid-->
	</div><!--//app-content-->

	<!--//app-footer-->

</div><!--//app-wrapper-->

@stop