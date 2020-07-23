@extends('backendtemplate')
@section('content')

<div class="container">
	<!-- Page Heading -->
	<h2><i class="fas fa-user-friends mx-2"></i>Voters</h2>

	<div class="container shadow">
		<div class="card-header py-3">
			<div class="row">
				<h4 class="m-0 font-weight-bold text-primary col-9 mr-5">Voters List</h4>
			</div>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Phoneno</th>
							<th colspan="3">Actions</th>
						</tr>
					</thead>
					<tbody>
						@php
							$i = 1;
						@endphp

						@foreach($voters as $voter)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$voter->name}}</td>
								<td>{{$voter->phoneno}}</td>
								<td>
									<a href="" class="btn btn-info">Detail</a>
								</td>
								<td>
									<a href="" class="btn btn-warning">Edit</a>
								</td>
								<td>
									<!-- Delete Mentor Data -->
									<form method="post" action="">
										@csrf
										@method('DELETE')
										<input type="submit" class="btn btn-danger" value="Delete"></input>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection