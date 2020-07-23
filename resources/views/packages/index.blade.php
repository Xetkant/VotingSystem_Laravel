@extends('backendtemplate')
@section('content')
<div class="container">
	<div class="row my-3">
		<h2 class="m-0 col-9 mr-5"><i class="fas fa-archive mx-2"></i>Packages List</h2>
		<a href="{{route('packages.create')}}" class="btn btn-secondary float-left">Add New Package</a>
	</div>

	<div class="container shadow">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Photo</th>
							<th>Amount</th>
							<th>Point</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@php
							$i = 1;
						@endphp

						@foreach($packages as $package)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$package->name}}</td>
								<td>{{$package->photo}}</td>
								<td>{{$package->amount}}</td>
								<td>{{$package->point}}</td>
								<td>
									<div class="row">
										
										<a href="{{route('packages.show',$package->id)}}" class="btn btn-info ml-5">Detail</a>
									
										<a href="{{route('packages.edit',$package->id)}}" class="btn btn-warning ml-5">Edit</a>
									
										<!-- Delete Mentor Data -->
										<form method="post" action="{{route('packages.destroy',$package->id)}}">
											@csrf
											@method('DELETE')
											<input type="submit" class="btn btn-danger ml-5" value="Delete"></input>
										</form>
									
								</div>
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