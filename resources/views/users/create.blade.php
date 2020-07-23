@extends('backendtemplate')
@section('content')
<div class="container">

	<h2><i class="fas fa-user-plus mx-2"></i>Voter Create Form</h2>

	<form  class="shadow p-3" method="post" action="{{route('voters.store')}}" enctype="multipart/form-data"> 
		@csrf

		<!-- @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif -->

		<div class="row">
		  	<div class="form-group col-12">
			    <label for="InputName">Voter's Name</label>
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
			    <label for="InputBio">Phoneno:</label>
			    <textarea class="form-control @error('phoneno') is-invalid @enderror" id="InputBio" name="phoneno"></textarea>
			    @error('phoneno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phoneno') }}</strong> 
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