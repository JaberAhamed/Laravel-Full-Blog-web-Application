@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <a href="{{ route('addPost') }}" class="btn btn-primary">Add new Post</a>
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
                        <th>Action</th>
                        
                      </tr>
                      @foreach($data as $row)
                      <tr>
                        <td>{{$row->User->name}}</td>
                        <td>{{$row->Category->category_name}}</td>
                        <td>{{$row->title}}</td>
                       
                        <td><img src="{{ URL::to($row->image) }}" style="height: 40px; width: 70px;"></td>
                        <td>{{$row->Details}}</td>
                        <td>
                          <a href="{{ URL::to('post/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                          <a href="{{ URL::to('post/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                          
                        </td>
                      </tr>
                      @endforeach
                      
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection