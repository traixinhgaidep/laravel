@extends('admin.layouts.admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>Roles</h3>
                    </div>


                    <div class="panel-body" style="margin: 5px">

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


                        <div>
                            <a href='{{route('admin.role.create') }}'>
                                <button type="button" class="btn btn-success btn-xs">New Role</button>

                            </a>
                        </div>
                        <form class="" action="{{ route('admin.role.delete') }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                       <table class="table table-striped task-table">
                           <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th>Action</th>
                                <th><input  type="checkbox" class="selectall">  Check All</th>
                           </thead>
                           <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="table-text">
                                            <div> {{ $role->id }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div> {{ $role->name }}</div>
                                        </td>
                                        <td class="table-text" style="width: 60%;">
                                            <div>
                                                @foreach($role->permissions as $permission)
                                                    <label class="label label-success"> {{$permission->description }}  </label> &nbsp;&nbsp;
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.role.edit', $role->id) }}">
                                                <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                            </a>
                                        </td>
                                        <td> <input class="individual" name="checkbox[]" type="checkbox" value="{{$role -> id}}"></td>
                                    </tr>
                                @endforeach
                           </tbody>
                       </table>
                            <input class="btn btn-danger"  disabled type="submit" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete" style="margin-right: 75px; float: right;">
                        </form>
                            <div class="text-center">
                            {{ $roles->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/backend/user_list.js') }}"></script>
@endsection