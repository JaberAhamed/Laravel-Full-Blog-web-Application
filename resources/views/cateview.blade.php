@extends('layouts.app')
@section('content')

 <div class="container">
 	<div>
 		<p>
 		
 	</p>
 	</div>
 	<div>
 		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
      @endif
 	</div>
   <form action="{{ route('storecat') }}" method="post">
   	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <input type="text" class="form-control" placeholder="Category" name="category_name" >
              
            </div>
          </div>
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Submit</button>
          </div>
          
        </form>
   </div>
@endsection