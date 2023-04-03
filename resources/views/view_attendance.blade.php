@extends('layout')

@section('active_view')
active
@stop

@section('body')
<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<h1 class="app-page-title">View Attendance</h1>

			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body p-3 p-lg-4">
						<h3 class="mb-3"></h3>
						<div class="row gx-5 gy-3">
							<div class="col-12 col-lg-12">
								<form class="settings-form" method="POST" action="{{route('submit_view_attendance')}}">
									@csrf
									<div class="mb-3">
										<label for="setting-input-1" class="form-label"> Select Staff</label>
										<select class="form-select" aria-label="Default select example" name="id">
											<option selected>Choose One</option>
											@if(count($data) > 0)
											@foreach($data as $staff)
											<option value="{{ $staff->id }}" {{ old('id') == $staff->id ? 'selected' : '' }}>
												{{ $staff->full_name }}
											</option>
											@endforeach
											@endif
										</select>

									</div>
									<div class="mb-3">
										<label for="setting-input-1" class="form-label">Select Month</label>
										<select class="form-select" aria-label="Default select example" name="month">
											<option selected>Choose One</option>
											<option value="January" {{ old('month') == 'January' ? 'selected' : '' }}>January</option>
											<option value="February" {{ old('month') == 'February' ? 'selected' : '' }}>February</option>
											<option value="March" {{ old('month') == 'March' ? 'selected' : '' }}>March</option>
											<option value="April" {{ old('month') == 'April' ? 'selected' : '' }}>April</option>
											<option value="May" {{ old('month') == 'May' ? 'selected' : '' }}>May</option>
											<option value="June" {{ old('month') == 'June' ? 'selected' : '' }}>June</option>
											<option value="July" {{ old('month') == 'July' ? 'selected' : '' }}>July</option>
											<option value="August" {{ old('month') == 'August' ? 'selected' : '' }}>September</option>
											<option value="October" {{ old('month') == 'October' ? 'selected' : '' }}>October</option>
											<option value="November" {{ old('month') == 'November' ? 'selected' : '' }}>November</option>
											<option value="Decemeber" {{ old('month') == 'Decemeber' ? 'selected' : '' }}>Decemeber</option>
										</select>

									</div>
									<div class="mt-3">
										<button type="submit" class="btn app-btn-primary">Save Changes</button>
									</div>
							</div>
							</form>
						</div>
						<br />
						<hr>

						<div class="table-responsive">
							<table class="table app-table-hover mb-0 text-left">
								<thead>
									<tr>
										<th class="cell">Date</th>
										<th class="cell">Status</th>
									</tr>
								</thead>
								<tbody>
									@if(session()->has('data'))
									@foreach(session('data') as $attendance)
									<tr>
										<td class="cell">{{ \Carbon\Carbon::parse($attendance->date)->format('jS F') }}
										</td>
										@if($attendance->status == 'present')
										<td class="cell"><span class="badge bg-success">{{ $attendance->status }}</span></td>
										@else
										<td class="cell"><span class="badge bg-danger">{{ $attendance->status }}</span></td>
										@endif
									</tr>
									@endforeach
									@endif

								</tbody>
							</table>
							<br />

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