@extends('backendtemplate')
@section('content')
<div class="container">
	<div>
		<h2><i class="fas fa-user-edit mx-2"></i>Candidate Edit Form</h2>
	</div>

	<div class="container shadow">
		<div class="row my-5 py-3">
			<div class="col-mb-12">
				<form method="post" action="{{route('candidates.update',$candidate->id)}}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Name : </label>
						<input type="text" name="name" class="col-form-label form-control @error('name') is-invalid @enderror" value="{{$candidate->name}}">
						@error('name')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('name') }}</strong> 
		                    </span>
		                @enderror
					</div>
					<div class="form-group">
						<label>Bio : </label>
						<textarea name="bio" class="col-form-label form-control @error('bio') is-invalid @enderror">{{$candidate->bio}}</textarea>
						@error('bio')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('bio') }}</strong> 
		                    </span>
		                @enderror
					</div>
					<div class="form-group">
						<label>Photo : </label>
						<input type="file" name="photo" class="col-form-label @error('photo') is-invalid @enderror" value="{{$candidate->photo}}">
						@error('photo')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('photo') }}</strong> 
		                    </span>
	                	@enderror
						<div class="col-2 ml-5">
							<img src="{{asset($candidate->photo)}}" class="img-fluid">
							<input type="hidden" name="oldphoto" value="{{$candidate->photo}}">
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