@extends('backendtemplate')
@section('content')

	<div class="container">
		<div>
			<h2><i class="fas fa-user-edit mx-2"></i>Package Detail Form</h2>
		</div>

		<div class="container shadow my-4">
			<form method="post" action="{{route('packages.show',$packages->id)}}" enctype="multipart/form-data">
			@csrf

			<div class="row">
					<div class="col-6 py-3">
						<img src="{{$packages->photo}}" class="img-fluid" style="height: 450px;">
					</div>
					<div class="col-5 float-right py-2 mx-2 align-self-center">
						<p style="font-size: 30px">
							<b>Name : </b> <span class="text-dark">{{$packages->name}}</span> 
						</p>
						<p style="font-size: 30px">
							<b>Amount : </b> <small class="text-dark">{{$packages->amount}}</small> 
						</p>
						<p style="font-size: 30px">
							<b>Point : </b> <small class="text-dark">{{$packages->point}}</small> 
						</p>

					</div>
			</div>
			

		</div>
	</div>


@endsection