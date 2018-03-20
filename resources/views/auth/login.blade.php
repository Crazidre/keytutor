@extends('layouts.app')

@section('content')

   <div class="container">
       <div class="row">
           <div class="col-sm-12">
               <div class="card">
                   <div class="card-body">

                   <form action="{{ route('login') }}" class="myauthform" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="email"> Email: </label>
                            <input type="email" placeholder="email address" name="email" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="password"> Password: </label>
                            <input type="password" placeholder="password" name="password" class="form-control" >
                        </div>
                        <div class="form-group feedback">

                        </div>
                        <hr>
                        <button type="submit" class="btn btn-outline-primary" > Login </button>
                        </form>
                       <br>
                    <a class="btn btn-outline-info" href="{{ route('password.request') }}"> Forgot my password  </a>

                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection
