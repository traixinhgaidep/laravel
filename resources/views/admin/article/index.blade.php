@extends('admin.layouts.admin.master')
@section('content')

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Article</h3>
            </div>



            <div class="panel-body">

                @if (session('success'))
                    <div class="alert alert-success fade in">
                        <button class="close" data-dismiss="alert">×</button>
                        <i class="fa-fw fa fa-check"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger fade in">
                        <button class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-times"></i>
                        {{ session('error') }}
                    </div>
                @endif


                @can('article-create')
                    <div>
                        <a href="{{ route('admin.article.create') }}">
                            <button type="button" class="btn btn-success">New Article</button>
                        </a>
                    </div>
                @endcan
                <br>
                <div class="row">
                    <form class="form-horizontal"method="GET" action="{{ route('admin.article.index') }}" autocomplete="false">
                        <div class="col-md-4 margin-top-20">
                            <input type="text" class="form-control" placeholder="Search by keyword" name="search" value="{{ isset($request['search']) ? $request['search'] : '' }}">
                        </div>
                        <div class="col-md-4 margin-top-20">
                            <select class="form-control" id="category_id" name ="category_id">
                                <option value = "">Select category </option>
                                {!! $categoriesHtml !!}
                            </select>
                        </div>
                        <div class="col-md-4 margin-top-20">
                            <button class="btn btn-primary" type="submit" >Search</button>
                        </div>
                    </form>
                </div>

                    <form class="" action="{{ route('admin.article.destroy') }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <table class="table table-striped task-table">
                    <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    {{--<th>Created Time</th>--}}

                    <th>Action</th>

                    @can('article-delete')
                        <th> <input  type="checkbox" class="selectall">  Check All </th>
                    @endcan
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        {{--{{dd($article)}}--}}
                        <tr>
                            <td class="table-text">
                                <div> {{ $article->id }}</div>
                            </td>
                            @can('article-edit')

                                <td class="table-text" >
                                    <a href="{{ route('admin.article.edit', $article->id) }}"><span style="{{$article->reject_flag ? "color:red;": ''}}">{{$article->title}}</span></a>
                                </td>

                            @else
                                <td class="table-text" >
                                    {{$article->title}}
                                </td>
                            @endcan
                            <td class="table-text">
                                <div> {{ $article->category }}</div>
                            </td>
                            <td class="table-text">
                                <div> {{ $article->author }}</div>
                            </td>
                            {{--<td class="table-text">--}}
                                {{--<div>{{$article->update_at}}</div>--}}
                            {{--</td>--}}
                            <td>

                                @can('article-publish')
                                    <form class=" visible-lg-inline-block" action="{{ route('admin.article.publish', $article->id) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input class="btn btn-info btn-xs" type="submit" value="Publish">
                                    </form>
                                @endcan
                                {{--@can('article-confirm')--}}
                                        {{--<form class=" visible-lg-inline-block" action="{{ route('admin.article.publish', $article->id) }}" method="POST">--}}
                                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
                                            {{--<input class="btn btn-info btn-xs" type="submit" value="Confirm">--}}
                                        {{--</form>--}}
                                    {{--@endcan--}}

                            </td>
                            @can('article-delete')
                                <td><input class="individual" name="checkbox[]" type="checkbox" value="{{$article -> id}}"></td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                        @can('article-delete')
                            <input class="btn btn-danger" id="delete-btn" disabled type="submit" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete" style="margin-right: 75px; float: right;">
                        @endcan
                    </form>
                        <div class="text-center">
                    {{ $articles->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/backend/articles_list.js') }}"></script>
@endsection
