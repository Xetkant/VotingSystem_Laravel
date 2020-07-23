@extends('backendtemplate')
@section('content')
<div class="container">
	<h2><i class="fas fa-archive mx-2"></i>Package List Form</h2>

	<form  class="shadow p-3" method="post" action="{{route('packages.store')}}" enctype="multipart/form-data"> 
		@csrf

		<div class="row">
		  	<div class="form-group col-12">
			    <label for="InputName">Package Name</label>
			    <input type="text" class="form-control @error('name') is-invalid @enderror" id="InputName" name="name" value="{{ old('name') }}">
			    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong> 
                    </span>
                @enderror
		  	</div>
	  	</div>

	  	<div class="row">
		  	<div class="form-group col-12">
			    <label for="InputAmount">Amount:</label>
			    <input type="number" min="50" class="form-control @error('amount') is-invalid @enderror" id="InputAmount" name="amount"></input>
			    @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('amount') }}</strong> 
                    </span>
                @enderror
		  	</div>
	  	</div>

	  	<div class="row">
		  	<div class="form-group col-12">
			    <label for="InputPoint">Point:</label>
			    <input type="number" min="1" class="form-control @error('point') is-invalid @enderror" id="InputPoint" name="point"></input>
			    @error('point')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('point') }}</strong> 
                    </span>
                @enderror
		  	</div>
	  	</div>

	  	<div class="row">
		  	<div class="form-group col-12">
			    <label for="InputPhoto">Photo:</label>
			    <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="InputPhoto" name="photo">
			    @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('photo') }}</strong> 
                    </span>
                @enderror
		  	</div>
	  	</div>
	  	<br>

  	<button type="submit" class="btn btn-primary col-12">Save Register</button>
	</form>
</div>
@endsection