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
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#branch">Create Transfer</button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="branch" tabindex="-1" aria-labelledby="branchLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="branchLabel">Select a Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Branch form -->
                <form action="{{ route('transfer_branch.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="border p-3 rounded">
                            <div class="col-12">
                                <label class="form-label">Select a Branch Name</label>
                                <select name="branch_id" id="" class="form-control" required>
                                    @forelse ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @empty
                                        <p>No branch</p>
                                    @endforelse
                                </select>
                            </div>
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


    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Transfer ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Total</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($transferedBranches as $key=>$branch)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->email }}</td>
                    <td>{{ $branch->phone }}</td>
                    <td>{{ $branch->address }}</td>
                </tr>
                @empty
                <p class="text-danger text-center">No data available</p>
                @endforelse


            </tbody>
        </table>
    </div>
</div>

@endsection