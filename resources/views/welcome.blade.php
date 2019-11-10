<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="title m-b-md">
                    ALL Post
                </div>
                      <div class="col-lg-12">
                         @foreach($allpost as $row)

                            <div class="card">
                                <div class="card-header">{{ $row->title }}</div>
                                 
                                      <div class="card-body">  


                                        
                            <h4><a href="{{ URL::to('single/postview/'.$row->id) }}"> {{$row->Category->category_name}}</a></h4>
                           
                                                 <br>
                                                 <img src="{{ URL::to($row->image) }}" style="height: 40px; width: 70px;">
                                                  <br>
                                                 <span class="card-title">{{$row->title}}</span>
                                                 <br>
                                      
                                                 <h5><p>{{$row->Details}}</p></h5>
                                                 <br>
                                               
                                         
                                                 <p>
                                                    Created by {{$row->User->name}}<br>
                                                    
                                                 </p>


                                   </div>
                                    
                             
                            </div>
                                    </br>
                                     </br>
                               @endforeach
                                {{ $allpost->links() }}
                       </div>                
                
            </div>
        </div>
    </body>
</html>






