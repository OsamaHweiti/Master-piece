@extends('admin/adminmaster')
@extends('admin/include/header')


@section('title', 'useredit')


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
                        <th>username</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>password</th>
                        <th>is admin</th>

                    </tr>
                </thead>
                <tbody>

                    @if ($errors->has('username'))
                        <p class="alert alert-danger ">{{ $errors->first('username') }}</p>
                    @endif
            
                    @if ($errors->has('email'))
                        <p class="alert alert-danger ">{{ $errors->first('email') }}</p>
                    @endif
                    @if ($errors->has('phone'))
                        <p class="alert alert-danger ">{{ $errors->first('phone') }}</p>
                    @endif


                    <form action="{{ route('userupdate', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <tr>
                          
                            <td><input type="text" value="{{ $user->username }}" name="username"> </td>
                            <td><input type="text" value="{{ $user->email }}" name="email"></td>
                            <td><input type="number" value="{{ $user->phone }}" name="phone"> </td>
                            <td><input type="text" value="{{ $user->password }}" name="password"> </td>
                            <td><input type="number" value="{{ $user->is_admin }}" name="is_admin"> </td>



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
