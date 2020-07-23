@extends('backendtemplate')
@section('content')
<div class="container">
	<div>
		<h2><i class="fas fa-user-edit mx-2"></i>Package Edit Form</h2>
	</div>

	<div class="container shadow">
		<div class="row my-2 py-3">
			<div class="col-mb-12 mx-3">
				<form method="post" action="{{route('packages.update',$packages->id)}}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Name : </label>
						<input type="text" name="name" class="col-form-label form-control @error('name') is-invalid @enderror" value="{{$packages->name}}">
						@error('name')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('name') }}</strong> 
		                    </span>
		                @enderror
					</div>

					<div class="form-group">
						<label>Amount : </label>
						<input type="number" name="amount" class="col-form-label form-control @error('amount') is-invalid @enderror" value="{{$packages->amount}}"></input>
						@error('amount')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('amount') }}</strong> 
		                    </span>
		                @enderror
					</div>

					<div class="form-group">
						<label>Point : </label>
						<input name="point" class="col-form-label form-control @error('point') is-invalid @enderror" value="{{$packages->point}}"></input>
						@error('point')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('point') }}</strong> 
		                    </span>
		                @enderror
					</div>

					<div class="form-group">
						<label>Photo : </label>
						<input type="file" name="photo" class="col-form-label @error('photo') is-invalid @enderror" value="{{$packages->photo}}">
						@error('photo')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('photo') }}</strong> 
		                    </span>
	                	@enderror
						<div class="col-2 ml-5">
							<img src="{{asset($packages->photo)}}" class="img-fluid">
							<input type="hidden" name="oldphoto" value="{{$packages->photo}}">
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