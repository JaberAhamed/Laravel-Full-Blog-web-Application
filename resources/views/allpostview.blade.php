@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <a href="{{ route('addCategory') }}" class="btn btn-primary">Add New Category</a>
               <a href="{{ route('addPost') }}" class="btn btn-primary">Add New Post</a>
             </br>
             </br>
            <div class="card">

                <div class="card-header">All Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    
                    <table class="table table-responsive">
                      <tr>
                        <th>Post Author</th>
                        <th>Category name</th>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Details</th>
                       
                        
                      </tr>
                      @foreach($allpost as $row)
                      <tr>
                        <td>{{$row->User->name}}</td>
                        <td>{{$row->Category->category_name}}</td>
                        <td>{{$row->title}}</td>
                       
                        <td><img src="{{ URL::to($row->image) }}" style="height: 40px; width: 70px;"></td>
                        <td>{{$row->Details}}</td>
                       
                      </tr>
                      @endforeach
                      
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection