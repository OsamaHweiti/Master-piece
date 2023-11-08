@extends('admin/adminmaster')
@extends('admin/include/header')


@section('title', 'Dashboard')


@section('main')
    
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="container border-radius">
                
                <div id="adddiv" style="background-color: white; text-align: center; padding:1%; display:none">
                    <form method="post" action="{{ route('services.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label class="col-2">Name:</label>
                        <input class="col-5" type="text" name="name" required><br>
                        <label class="col-2">description:</label>
                        <input class="col-5" type="text" name="description" required><br>
                        <label class="col-2">Photo:</label>
                        <input class="col-5" type="file" name="photo" required><br>
                      
                     <br>
                        <input type="submit" class="btn btn-outline-secondary" value="Add Serives">
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
                                <i class="zmdi zmdi-account-calendar"></i> Serives
                            </h3>
                        </div>
                        <div class="col mb-2">

                            <form method="post">
                                <p style="text-align: left; color: #888">Total number of Serives: {{ $sum }} &nbsp;
                                    <input type="button" id="addUser-btn" class="btn btn-outline-secondary"
                                        value="Add Serives" name="Add Serives">
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
                                        <td>name</td>
                                        <td>description</td>
                                        <td>photo</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->photo }}</td>
                                          
                                            <td>
                                                <a href="{{ route('serviceedit', $item->id) }}">
                                                    <button class="btn btn-outline-primary" value="Edit"
                                                        name="editpro"> Edit
                                                    </button></a>
                                            </td>
                                            <td>
                                                {{-- NOT WOKRING  YA 3rsat  --}}
                                                <form method="post"action="{{ route('servicedelete', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-outline-danger" value="Delete">
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
@endsection
