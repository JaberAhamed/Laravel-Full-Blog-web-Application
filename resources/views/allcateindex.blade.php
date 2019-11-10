@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <a href="{{ route('addCategory') }}" class="btn btn-primary">Add New Category</a>
                 <a href="" class="btn btn-primary">Add New Post</a>
             </br>
             </br>
            <div class="card">

                <div class="card-header">All Category</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                     <table class="table table-border">
                             <tr>
                              <thead>
                               
                                <th>Category Name </th>
                                
                                </thead>
                            </tr>
                            
                            
                            <tbody>
                           
                            @foreach($allCat as $row)
                
                                <tbody>
                                <tr>
                                    <td>{{$row->category_name}}</td>
                                    
                                   
                                    
                                    
                                </tr>
                                </tbody>
                                @endforeach
                           
                          
                            </tbody>
                            
                    
                            
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection