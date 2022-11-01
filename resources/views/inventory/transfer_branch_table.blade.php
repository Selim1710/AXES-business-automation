@extends('layouts.app')
@section('content')
<br><br>
<h2 class="my-4">Transfer From Branch</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<div class="card mb-4">
    
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>image</th>
                    <th>Product</th>
                    <th>Quantity</th>

                    <th><i class="fa fa-paper-plane"></i></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($transBranchProducts as $key=>$branch)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->email }}</td>
                    <td>{{ $branch->phone }}</td>
                    <td>{{ $branch->address }}</td>

                    <td>
                        <a class="btn btn-success" href="{{ route('inventory.branch.edit', $branch->id) }}" style="font-size:13px"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No data available</p>
                @endforelse


            </tbody>
        </table>
    </div>
</div>

@endsection