@extends('layouts.app')
@section('content')
@parent
 <div class="container">
 	


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
   <form  action="{{ route ('postinsert')  }}"  method="post" enctype="multipart/form-data">
   	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Title" name='title' required >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
             
              <select class="form-control" name="category_id">
              	 @foreach($allCat as $row)
              	<option value="{{$row->id}}">{{$row->category_name}}</option>
              	   @endforeach
   	
              </select>
           
              
            </div>
          </div>
          <hr>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Image </label>
              <input type="file"  placeholder="imageupload" name='image' >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" name='details' required></textarea>
          
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
        </form>
      </div>  
@endsection