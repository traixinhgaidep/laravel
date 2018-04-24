@extends('admin.layouts.admin.master')
@section('content')

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Article</h3>
            </div>
            <div class="panel-body">
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
                <table class="table table-striped task-table">
                    <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Updated Time</th>
                    </thead>
                    <tbody>
                    {{--@foreach($articles as $article)--}}
                        {{--<tr>--}}
                            {{--<td class="table-text">--}}
                                {{--<div> {{ $article->id }}</div>--}}
                            {{--</td>--}}
                            {{--@can('article-edit')--}}
                                {{--@role('author')--}}
                                {{--<td class="table-text" >--}}
                                    {{--<a href="{{ route('admin.article.edit', $article->id) }}"><span style="{{$article->reject_flag ? "color:red;": ''}}">{{$article->title}}</span></a>--}}
                                {{--</td>--}}
                                {{--@endrole--}}
                                {{--@role('editor')--}}
                                {{--<td class="table-text" >--}}
                                    {{--<a href="{{ route('admin.article.edit', $article->id) }}"><span style="{{$article->reject_flag ? "color:red;": ''}}">{{$article->title}}</span></a>--}}
                                {{--</td>--}}
                                {{--@endrole--}}

                            {{--@else--}}
                                {{--<td class="table-text" >--}}
                                    {{--{{$article->title}}--}}
                                {{--</td>--}}
                            {{--@endcan--}}
                            {{--<td class="table-text">--}}
                                {{--<div> {{ $article->name }}</div>--}}
                            {{--</td>--}}
                            {{--<td class="table-text">--}}
                                {{--<div> {{ $article->published }}</div>--}}
                            {{--</td>--}}
                            {{--<td class="table-text">--}}
                                {{--<div>{{$article->update_at}}</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--@can('article-delete')--}}
                                    {{--<form class=" visible-lg-inline-block" action="{{ route('admin.article.destroy', $article->id) }}" method="POST">--}}
                                        {{--<input type="hidden" name="_method" value="DELETE">--}}
                                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
                                        {{--<input class="btn btn-danger btn-xs" type="submit" value="Delete">--}}
                                    {{--</form>--}}
                                {{--@endcan--}}
                                {{--@can('article-publish')--}}
                                    {{--<form class=" visible-lg-inline-block" action="{{ route('admin.article.publish', $article->id) }}" method="POST">--}}
                                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
                                        {{--<input class="btn btn-info btn-xs" type="submit" value="Publish">--}}
                                    {{--</form>--}}
                                {{--@endcan--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>
                </table>
                {{--<div class="text-center">--}}
                    {{--{{ $articles->render() }}--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/backend/article_api_list.js') }}"></script>

@endsection
