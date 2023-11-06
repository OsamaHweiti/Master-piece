@extends('admin/adminmaster')
@extends('admin/include/header')


@section('title', 'Dashboard')


@section('main')

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="container border-radius">
                
                <div id="adddiv" style="background-color: white; text-align: center; padding:1%; display:none">
                    <form method="post" action="{{ route('users.store') }}">
                        @csrf
                        <label class="col-2">Username:</label>
                        <input class="col-5" type="text" name="username" required><br>
                        <label class="col-2">Email:</label>
                        <input class="col-5" type="text" name="email" required><br>
                        <label class="col-2">Mobile:</label>
                        <input class="col-5" type="text" name="phone" required><br>
                        <label class="col-2">Password:</label>
                        <input class="col-5" type="text" name="password" required><br>
                        <label class="col-2">Admin:</label>
                        <input type="radio" value="1" name="is_admin" required> Yes
                        <input type="radio" value="0" name="is_admin" required> No<br><br>
                        <input type="submit" class="btn btn-outline-secondary" value="Add">
                    </form>

                </div>
            </div>
            <hr>
            <div class="col-lg-12">
                <!-- USER DATA-->
                <div class="user-data m-b-30" style="background-color: white;padding:2%">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-8">
                            <h3 class="title-3">
                                <i class="zmdi zmdi-account-calendar"></i> Users
                            </h3>
                        </div>
                        <div class="col mb-2">

                            <form method="post">
                                <p style="text-align: left; color: #888">Total number of users: {{ $sum }} &nbsp;
                                    <input type="button" id="addUser-btn" class="btn btn-outline-secondary"
                                        value="Add New User" name="adding">
                            </form>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        
                    @endif

                        <div class="table-responsive table-data">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>username</td>
                                        <td>Email</td>
                                        <td>Mobile</td>
                                        <td>Is Admin</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->is_admin }}</td>
                                            <td>
                                                <a href="{{ route('usersedit', $user->id) }}">
                                                    <button class="btn btn-outline-primary" value="Edit"
                                                        name="editpro"> Edit
                                                    </button></a>
                                            </td>
                                            <td>
                                                {{-- NOT WOKRING  YA 3rsat  --}}
                                                <form method="post"action="{{ route('usersdelete', $user->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-outline-danger" value="{{$user->id}}">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- END USER DATA-->
                </div>
            </div>

        </div>
    </div>

    <script>
        
    </script>
@endsection
