@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"> {{ $post->title }} </div>
                    <div class="card-body">
                        {{ $post->body }}
                    </div>
                    <div class="card-footer">
                       <ul class="list-group">
                        @foreach ($post->comments as $comment)
                            <li class="list-group-item">
                                <b> {{ $comment->user->name }} : </b> <p>
                                    {{ $comment->comment }}
                                    @if ($comment->user_id == Auth::user()->id )

                                       &nbsp; <a class="btn btn-default bg-white" data-toggle="collapse" data-target="#mycomment{{ $comment->id }}" > <i class="fas fa-pen-square" aria-hidden="true"></i> </a>
                                    
                                    <div id="mycomment{{ $comment->id }}" class="collapse">

                                    <form action="/comment/edit/{{ $comment }}" class="myform" method="post">
                                            @csrf
                                           <input type="hidden" name="type" value="App\Post">
                                           <input type="hidden" name="id" value="{{ $post->id }}"  >    
                                            <div class="form-group">
                                            <textarea name="comment" class="form-control" id="" cols="30" rows="10">
                                                {{ $comment->comment }}
                                            </textarea>
                                            </div>
                                            <div class="form-group feedback">
                
                                            </div>
                                            <button class="btn btn-success" type="submit"> Update. </button>
                                            </form>

                                    </div>

                                    @endif
                                </p>
                            </li>
                        @endforeach
                       </ul>
                       <div class="row">
                           <div class="container">
                           <form action="{{ route('comment') }}" class="myform" method="post">
                            @csrf
                           <input type="hidden" name="type" value="App\Post">
                           <input type="hidden" name="id" value="{{ $post->id }}"  >    
                            <div class="form-group">
                                <textarea name="comment" class="form-control" id="" placeholder="Comment something" cols="30" rows="10">
                                </textarea>
                            </div>
                            <div class="form-group feedback">

                            </div>
                            <button class="btn btn-success" type="submit"> Comment </button>
                            </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection