@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Manage Product</h2>
<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">New Create</button>
        <!-- Modal -->
        <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <form action="{{route('manage-product-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">

                                <div class="col-12">
                                    <label class="form-label"><b>Date</b></label>
                                    <input type="text" class="form-control" name="date" placeholder="e.g  10/11/2022" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label"><b>Product</b></label>
                                    <input type="text" class="form-control" name="product" placeholder="e.g  hp-12012" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Serial</b></label>
                                    <input type="text" class="form-control" name="serial" placeholder="e.g 520" >
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b> Note</b></label>
                                    <input type="text" class="form-control" name="note" placeholder="e.g waiting" >
                                </div>


                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="save" required>
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
                    <th>Date</th>
                    <th>Product</th>
                    <th>Serial</th>
                    <th>Note</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>



            @php $i=1 @endphp
            @foreach($ManageProduct as $ManageProducts)
                <tr>
                    <td>{{ $i++ }} </td>
                    <td>{{ $ManageProducts->date }} </td>
                    <td>{{ $ManageProducts->product }} </td>
                    <td>{{ $ManageProducts->serial }} </td>
                    <td>{{ $ManageProducts->note }} </td>

                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('manage-product-edit',['id'=>$ManageProducts->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('manage-product-delete')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="manage_product_delete" value="{{$ManageProducts->id}}">
                                <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>

            @endforeach
            </tbody>

        </table>
    </div>



    @endsection
