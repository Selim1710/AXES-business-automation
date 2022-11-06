@extends('layouts.app')
@section('content')
<section>
    <br><br>
    <h2 class="my-4 text-center">View Branch data</h2>
    <br>
    <!-- message -->
    @if(session()->has('message'))
    <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
    @elseif(session()->has('error'))
    <p class="alert alert-danger text-center">{{ session()->get('error') }}</p>
    @endif
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <!-- select item -->
                <div class="col-12">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Branch code</th>
                                <th>Branch name</th>
                                <th>Product code</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($previewDeliveries as $key=>$data)
                            <tr class="text-center">
                                <td> {{ $data['branch_id'] }} </td>
                                <td> {{ $data['branch_name'] }} </td>
                                <td> {{ $data['product_id'] }} </td>
                                <td> {{ $data['product_name'] }} </td>
                                <td> {{ $data['qty'] }} </td>
                                <!-- remove -->
                                <td>
                                    <a class="btn btn-danger" href="{{ route('branch.product.transfered.delete',$key) }}" style="font-size:13px"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                            <p class="text-danger text-center">No data available</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection