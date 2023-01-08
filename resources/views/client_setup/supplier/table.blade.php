@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">All supplier</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#supplier">Create New supplier</button>
        <!-- Modal -->
        <div class="modal fade" id="supplier" tabindex="-1" aria-labelledby="supplierLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="supplierLabel">Create New supplier</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="{{ route('supplier.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="message">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>

                            <div class="border p-3 rounded">
                                <div class="row">

                                    <div class="col-6">
                                        <label class="form-label">supplier Name</label>
                                        <input type="text" class="form-control" name="ss_name" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="number" name="contact" class="form-control" required>
                                    </div>

                                </div>

                                <div class="my-3"></div>
                                <div class="row">

                                    <div class="col-6">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" cols="30" rows="4" required></textarea>
                                    </div>

                                </div>
                                <div class="my-3"></div>
                                <div class="row">


                                </div>
                                {{-- <div class="my-3"></div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Role</label>
                                        <input type="text" name="role" value="supplier" class="form-control" name="supplier" readonly>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- table -->
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr class="text-capitalize">
                    <th>SN</th>

                    {{-- <th>group</th> --}}
                    <th>Name</th>

                    <th>Mobile Number</th>

                    <th>address</th>

                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($suppliers as $key=>$supplier)
                <tr>
                    <td>{{ $key+1 }} </td>

                    {{-- <td>{{ $supplier->client_group_id }}</td> --}}
                    <td>{{ $supplier->ss_name }}</td>

                    <td>{{ $supplier->contact }}</td>
                    <td>{{ $supplier->address }}</td>


                    <td>
                        <a class="btn btn-success" href="{{ route('supplier.edit', $supplier->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('client_setup.supplier.delete', $supplier->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No supplier available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
