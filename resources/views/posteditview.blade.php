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
    <form  action="{{ URL::to('post/update/'.$psedit->id)}}"  method="post"  enctype="multipart/form-data">
    @csrf
     
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" value="{{$psedit->title}}"  name='title' required >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
             
              <select class="form-control" name="category_id">
                 @foreach($allCat as $row)
                <option value="{{$row->id}}" <?php if ($row->id==$psedit->category_id) echo "selected ";?> >
                  {{ $row->category_name  }}</option>s
                   @endforeach
    
              </select>
           
              
            </div>
          </div>
          <hr>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>New image </label>
              <input type="file"  placeholder="imageupload" name='image' >
              
            </div>
          </div>
          </br>
          </br>
           <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <h4>Old Image </h4>
              <img src="{{URL::to($psedit->image)  }}" >
              <input type="hidden" name="old_image" value="{{$psedit->image}}">
              
            </div>
          </div>



          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control"  name='details' required>
                {{$psedit->Details}} 
              </textarea>
          
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>

        </form>
      </div>  
@endsection