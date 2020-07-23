@extends('backendtemplate')
@section('content')
<div class="container">
	<div>
		<h2><i class="fas fa-user-edit mx-2"></i>Voters Edit Form</h2>
	</div>

	<div class="container shadow">
		<div class="row my-5 py-3">
			<div class="col-mb-12">
				<form method="post" action="{{route('voters.update',$voter->id)}}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Name : </label>
						<input type="text" name="name" class="col-form-label form-control @error('name') is-invalid @enderror" value="{{$voter->name}}">
						@error('name')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('name') }}</strong> 
		                    </span>
		                @enderror
					</div>
					<div class="form-group">
						<label>PhoneNo : </label>
						<textarea name="phoneno" class="col-form-label form-control @error('phoneno') is-invalid @enderror">{{$voter->phoneno}}</textarea>
						@error('phoneno')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('phoneno') }}</strong> 
		                    </span>
		                @enderror
					</div>
					<div class="form-group">
						<label>Photo : </label>
						<input type="file" name="photo" class="col-form-label @error('photo') is-invalid @enderror" value="{{$voter->photo}}">
						@error('photo')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('photo') }}</strong> 
		                    </span>
	                	@enderror
						<div class="col-2 ml-5">
							<img src="{{asset($voter->photo)}}" class="img-fluid">
							<input type="hidden" name="oldphoto" value="{{$voter->photo}}">
						</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection