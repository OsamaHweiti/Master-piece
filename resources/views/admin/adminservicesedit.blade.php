@extends('admin/adminmaster')
@extends('admin/include/header')


@section('title', 'Dashboard')


@section('main')

    <div class="section__content section__content--p30">
        <div class="card-body table-responsive">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>description</th>
                        <th>Photo</th>


                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('serviceupdate', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <tr>

                            <td><input type="text" value="{{ $service->name }}" name="name" required> </td>
                            <td><input type="text" value="{{ $service->description }}" name="description" required> </td>
                            <td><input type="file" value="{{ $service->photo }}" name="photo"> </td>
                            <td>
                                <button type="submit" class="btn btn-block btn-primary btn-sm "
                                    id="openModal">Save</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
@endsection
