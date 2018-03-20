@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="conatiner">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"> {{ Auth::user()->name }} </div>
                    <div class="card-body">
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" width="200px" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection