@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                    <p class="text-center"> Welcome <b> {{ Auth::user()->name }} </b>  </p>

                    @if (Auth::user()->tutor)

                       @if (Auth::user()->videos->count() > 0 )

                       <div class="container">

                            @foreach (Auth::user()->videos as $video)


                            <div class="col-sm-3">
                                <p> <a href="{{ route('video.show',[$video]) }}"> {{ $video->title }} </a> </p>
                            </div>

                           
                            @endforeach

                       </div>
                           
                       @endif
                    
                    @endif

                    <hr>

                    <div class="container">

                            @foreach (Auth::user()->posts as $post)

                           <div class="col-sm-3">
                               <div class="card">
                               <div class="card-header"> <a href="{{ route('post.show' , [$post] ) }}"> {{ $post->title }} </a> </div>
                                   <div class="card-body"> {{ substr($post->body,0,20) }} </div>
                                   <div class="card-footer">
                                     <p> <span> {{ $post->comments->count() }} </span> Comments </p>
                                     <p> @if ($post->isLikedBy())
                                        
                                     <form action="/unlike/{{ $post }}" class="myform" method="post">
                                            @csrf 
                                            <button type="submit" class="btn" > <i class="fas fa-heart text-danger "></i>  </button>
                                            {{ $post->likesCount }} 
                                        </form>

                                        @else
                                    <form action="/like/{{ $post }}" class="myform" method="post">
                                                @csrf 
                                                <button type="submit" class="btn bg-white" > <i class="far fa-heart text-danger "></i>   </button> 
                                                {{ $post->likesCount }} 
                                        </form>
                                     @endif  
                                   </div>
                               </div>
                           </div>
                        
                            @endforeach        

                    </div>
                    <br>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
