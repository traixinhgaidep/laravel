@extends('admin.layouts.admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>All Users ({{$count}})</h3>
                    </div>

                    <div class="panel-body">

                        <div>
                            <a href="{{ route('admin.user.create') }}">
                                <button type="button" class="btn btn-success">Create New User</button>
                            </a>
                        </div>
                        <form class="" action="{{ route('admin.user.destroy') }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <table class="table table-striped task-table">
                                <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                                <th><input  type="checkbox" class="selectall">  Check All</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="table-text">
                                            <div> {{ $user -> name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div> {{ $user->email }}</div>
                                        </td>
                                        <td class="table-text">
                                        @foreach($user->roles as $role)
                                                <label class="label label-success">{{$role->name}}</label>
                                        @endforeach
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->id) }}">
                                                <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                            </a>
                                        </td>
                                        <td> <input class="individual" name="checkbox[]" type="checkbox" value="{{$user -> id}}"></td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <input class="btn btn-danger"  disabled type="submit" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete" style="margin-right: 75px; float: right;">
                        </form>
                        <div class="text-center">
                            {{ $users->render() }}
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