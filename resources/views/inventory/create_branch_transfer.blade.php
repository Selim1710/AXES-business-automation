@extends('layouts.app')
@section('content')
<section>
    <br><br>
    <h2 class="my-4 text-center">Create Transfer From Branch product</h2>
    <br>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <!-- select branch -->
                <div class="col-12 col-lg-12">

                </div>
                <!-- select item -->
                <div class="col-12 col-lg-6">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th><a href="#"><i class="fa fa-paper-plane"></i></a></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($branchProducts as $product)
                            <tr>
                                <td><img src="{{ asset('/uploads/products/'.$product->image) }}" style="height:50px;width:50px;"> </td>
                                <td> {{ $product->name }} </td>
                                <td>{{ $product->id }}</td>

                                <td>
                                    &nbsp; <a class="btn btn-success" href="#" style="font-size:13px"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @empty
                            <p class="text-danger text-center">No data available</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- showing selected items -->
                <div class="col-12 col-lg-6" style="background-color: #ecf0f1;">
                    <div class="my-4">
                        <table class="table table-hover table-bordered table-responsive">
                            <thead class="bg-light text-center">
                                <tr>
                                    <th>SL</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($branchProducts as $key=>$product)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td class="d-flex justify-content-center"><input type="number" class="form-control w-50"></td>

                                    <td>
                                        <a class="btn btn-danger" href="#" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <p class="text-danger text-center">No data available</p>
                                @endforelse
                                <tr>
                                    <td></td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="2">Total:</td>
                                    <td colspan="2">100</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-danger"> Empty</a>
                            <a href="#" class="btn btn-success"> Transfer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection