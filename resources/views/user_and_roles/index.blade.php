@extends('layouts.app')
@section('content')

    <h2 class="mt-4 mb-4">All User</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span>
            </span>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New User</button>
                            <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="create-user">
                            <div class="modal-body">
                                <div class="alert alert-danger" id="errormsg"></div>
                                      <div class="border p-3 rounded">
                                       
                                        <div class="col-12">
                                          <label class="form-label">Name</label>
                                          <input type="text" class="form-control" name="name">
                                        </div>

                                        <div class="col-12">
                                          <label class="form-label">Email Address</label>
                                          <input type="email" class="form-control" name="email">
                                        </div>
 
                                        <div class="col-12">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone_number">
                                          </div>

                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                          </div>

                                          <div class="col-12 mb-4">
                                            <label class="form-label">Conform Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                          </div>

                                      
                                    </div>
                            </div>
                            <div class="modal-footer">
                                @csrf
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create User</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
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
                        <th>Phone</th>
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
                        <td>{{ $user->phone_number }}</td>
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