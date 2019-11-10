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

              

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="col-lg-12">
                       

                            <div class="card">
                                <div class="card-header">{{ $singledata->title }}</div>
                                 
                                      <div class="card-body">  


                                          
                          
                                                 <h4>{{$singledata->Category->category_name}}</h4>
                                                 <br>
                                                 <img src="{{ URL::to($singledata->image) }}" style="height: 40px; width: 70px;">
                                                  <br>
                                                 
                                                 <br>
                                      
                                                 <h5><p>{{$singledata->Details}}</p></h5>
                                                 <br>
                                               
                                         
                                                 <p>
                                                    Created by {{$singledata->User->name}}<br>
                                                    
                                                 </p>


                                   </div>
                                    
                             
                            </div>
                                    </br>
                                     </br>
                              
                       </div>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection