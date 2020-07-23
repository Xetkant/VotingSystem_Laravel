@extends('backendtemplate')
@section('content')

	<div class="container">
		<div>
			<h2><i class="fas fa-user-edit mx-2"></i>Voter's Detail Form</h2>
		</div>

		<div class="container shadow my-4">
			<form method="post" action="{{route('voters.show',$voter->id)}}" enctype="multipart/form-data">
			@csrf

			<div class="row">
					<div class="col-6 py-3">
						<img src="{{$voter->photo}}" class="img-fluid" style="height: 450px;">
					</div>
					<div class="col-5 float-right py-2 mx-2 align-self-center">
						<p style="font-size: 30px">
							<b>Name : </b> <span class="text-dark">{{$voter->name}}</span> 
						</p>
						<p style="font-size: 30px">
							<b>Phoneno : </b> <small class="text-dark">{{$voter->phoneno}}</small> 
						</p>

					</div>
			</div>
			

		</div>
	</div>


@endsection