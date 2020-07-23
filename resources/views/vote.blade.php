@extends('backendtemplate')
@section('content')
<div class="container">
	<div class="row my-3">
		<h2 class="m-0 col-9 mr-5"><i class="fas fa-vote-yea mx-2"></i>Vote List</h2>
	</div>

	<div class="container shadow">
		<div class="card-body"> 
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>User Name</th>
							<th>Candidate Name</th>
							<th>Package Name</th>
							<th>Point</th>
						</tr>
					</thead>
					<tbody>
						@php
							$i = 1;
						@endphp

						@foreach($votes as $vote)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$vote->user_name}}</td>
								<td>{{$vote->candidate_name}}</td>
								<td>{{$vote->package_name}}</td>
								<td>{{$vote->point}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection