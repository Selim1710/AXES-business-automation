@extends('layouts.app')
@section('content')

    <h1 class="mt-4">All User</h1>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span>
                 <i class="fas fa-table me-1"></i>
                 All User
            </span>
            <a class="btn btn-primary" href="{{route('users.create')}}" role="button">Create New User</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Access</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Access</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                    @endphp
                        
                    
                @foreach($users as $user)
                    @php
                        $serial++;
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td>
                            {{ $user->image }}
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->access }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <a class="btn btn-success" style="font-size:13px" href="{{route('users.edit',$user->id)}}" role="button">Edit</a>
                            <a class="btn btn-danger" style="font-size:13px " href="#" role="button">Ban</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection