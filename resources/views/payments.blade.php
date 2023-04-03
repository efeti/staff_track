@extends('layout')

@section('active_payment')
active
@stop

@section('body')
<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<h1 class="app-page-title">Payments</h1>

			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body p-3 p-lg-4">
						<h3 class="mb-3"></h3>
						<div class="row gx-5 gy-3">
							<div class="col-12 col-lg-12">
								<form class="settings-form" method="POST" action="{{route('submit_payments')}}">
									@csrf
									<div class="mb-3">
										<label for="setting-input-1" class="form-label"> Select Staff</label>
										<select class="form-select" aria-label="Default select example" name="id">
										<option selected>Choose One</option>
										$day = date('d', strtotime($dateString));
											@foreach($data as $staff)
											<option value="{{ $staff->id }}" {{ old('id') == $staff->id ? 'selected' : '' }}>
												{{ $staff->full_name }}
											</option>
											@endforeach
										
										</select>

									</div>
									<div class="mb-3">
										<label for="setting-input-1" class="form-label"> Select Month</label>
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
										<button type="submit" class="btn app-btn-primary">Submit</button>
									</div>
							</div>

							</form>
						</div>
						<br />
						<hr />

						<div class="row mb-3">
							<div class="col-12 col-lg-6">
								<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start p-4 bg-success">
									<h6 class="text-white">Present</h6>
									<h1 class="text-white">{{ session('status.present') }}</h1>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start p-4 bg-danger">
									<h6 class="text-white">Absent</h6>
									<h1 class="text-white">{{ session('status.absent') }}</h1>
								</div>
							</div>
						</div>


						<div class="col-auto">
							<h4 class="app-card-title">Make Payment</h4>
						</div><!--//col-->
					</div><!--//row-->
				</div><!--//app-card-header-->
				<div class="app-card-body px-4 w-100">

					<div class="item border-bottom py-3">
						<div class="row justify-content-between align-items-center">
							<div class="col-auto">
								<div class="item-label"><i class="fab fa-cc-visa me-2"></i><strong>Salary
									</strong></div>
								<div class="item-data"><i class="fa-solid fa-naira-sign"></i> {{ session('status.payment') !== null ? session('status.payment') : '0.00'}}</div>
							</div>

						</div>
					</div>
					<div class="mt-3">
						<button type="submit" class="btn app-btn-primary">Proceed To Payment Gateway</button>
					</div>

				</div><!--//app-card-body-->
			</div><!--//container-fluid-->
		</div><!--//app-content-->

		<!--//app-footer-->

	</div><!--//app-wrapper-->

</div>
@stop