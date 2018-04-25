@extends('HomePage.layouts.master')
@section('content')

<div class="container " >
<div class="row" >
    <div class="col-md-9">
        <div class="panel-body detailpage">
            <h3 ><b>{{$article->title}}<b></h3> 
                <i>{{$article->created_at}}</i>
                <img class="img-responsive"  src="{{asset($article->thumbnail) }}"/>
                <!-- <p> <?= nl2br($article->content) ?> <p> -->
                <p> <?=$article->content?><p>
                </div>
            </div>
            @include('HomePage.layouts.include.side_bar') 


        </div>
    </div>
@endsection