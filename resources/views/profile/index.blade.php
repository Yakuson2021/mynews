@extends('layouts.profile')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
    
    <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                            
                        
                        <li><b>名前<div class="col-md-6"></b>
                            <p class="body mx-auto">{{ str_limit($headline->name, 650) }}</li></p>
                      
                        <li><b>性別<div class="col-md-6"></b>
                            <p class="body mx-auto">{{ str_limit($headline->gender, 650) }}</li></p>
                       
                        <li><b>趣味<div class="col-md-6"></b>
                            <p class="body mx-auto">{{ str_limit($headline->hobby, 1000) }}</li></p>
                        
                        <li><b>自己紹介<div class="col-md-6"></b>
                            <p class="body mx-auto">{{ str_limit($headline->introduction, 1500) }}</li></p>
                           </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        @endif
@endsection