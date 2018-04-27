 <div class="col-md-3 ">
    <form class="Search" method="GET" action="{{ route('home') }}">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ isset($request['search']) ? $request['search'] : '' }}">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <ul class="list-group " >
        <li class="list-group-item title-list">
            <b>DANH MỤC</b> 
        </li>
        @foreach($categories as $catego) 
        <li class="list-group-item ">
            <i class="fa fa-chevron-right"></i> <a href="{{route('home', [ 'category_id' => $catego->id]) }}">  {{$catego->name}}</a>
        </li>
        @endforeach
    </ul>
</div>    