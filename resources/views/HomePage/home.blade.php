@extends('HomePage.layouts.master')
@section('content')
 
   <div class="container" >
        <div class="row" >
            <div class="col-md-9">
                <div class="panel-body"  >
                    <div class="row container-fluid" >
                        @foreach($articles as $article)
                        <div class="col-sm-4" >
                            <div class="content-box">
                                <a href="{{route('detail', [ 'id' => $article->id]) }}"> <h4 class="title"><b>{{$article->title}}<b></h4> </a>
                                    <div class="image-box">
                                        <img src="{{ asset($article->thumbnail) }}"/>
                                    </div>

                                    <div class="content-artcle">
                                        <i>{{$article->created_at}}</i> 
                                        <p class="content-text"><?=implode(' ', array_slice(explode(' ', $article->content), 0,20))." ..."?></p>
                                    </div>
                                    <a href="{{route('detail', [ 'id' => $article->id]) }}" class="read-more"><button type="button" class="btn btn-success btn-xs"> ÐỌC TIẾP</button></a>
                                </div>
                            </div>
                            @endforeach
                        </div>  
                        <div class="row pagination" >{{$articles->links()}}</div> 
                    </div>
                </div>
                @include('HomePage.layouts.include.side_bar') 


            </div>
        </div>
@endsection