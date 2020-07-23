@extends('backendtemplate')
@section('content')

<div class="container">
	<div class="row my-3">
		<h2 class="m-0 col-9 mr-5"><i class="fas fa-user-friends mx-2"></i>Candidates List</h2>
		<a href="{{route('candidates.create')}}" class="btn btn-secondary float-left">Add New Candidate</a>
	</div>

	<div class="container shadow">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Bio</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@php
							$i = 1;
						@endphp

						@foreach($candidates as $candidate)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$candidate->name}}</td>
								<td>{{$candidate->bio}}</td>
								<td>
									<div class="row">
										
										<a href="{{route('candidates.show',$candidate->id)}}" class="btn btn-info ml-5">Detail</a>
									
										<a href="{{route('candidates.edit',$candidate->id)}}" class="btn btn-warning ml-5">Edit</a>
									
										<!-- Delete Mentor Data -->
										<form method="post" action="{{route('candidates.destroy',$candidate->id)}}">
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