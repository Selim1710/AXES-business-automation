@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid" style="margin-top: 25px;">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Sales Estimates</h3>
                        <ul class="breadcrumb">
{{--                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>--}}
{{--                            <li class="breadcrumb-item active">Estimates</li>--}}
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{route('sales-estimate-create-show')}}" class="btn add-btn"><i class="fa fa-plus"></i> Create Estimate</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="date">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="date">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option>Select Status</option>
                            <option>Accepted</option>
                            <option>Declined</option>
                            <option>Expired</option>
                        </select>
                        <label class="focus-label">Status</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Invoice</th>
                                <th>Total</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>1.1.2023</td>
                                <td>Md Shafiq</td>
                                <td>5552</td>
                                <td>12100</td>
                                <td>Complete</td>


                                <td>
                                    <div style="min-width: 10rem;">
                                        <a class="btn btn-success" style="font-size:13px" href="" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                        <form action="" method="post" style="display:inline">
                                            @csrf
                                            <input type="hidden" name="warranty_delete" value="">
                                            <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </div>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Delete Estimate Modal -->
        <div class="modal custom-modal fade" id="delete_estimate" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Estimate</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="e_id" value="">
                            <input type="hidden" name="estimate_number" class="estimate_number" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Estimate Modal -->

    </div>
    <!-- /Page Wrapper -->
    @endsection
@section('script')
    {{-- delete model --}}
    <script>
        $(document).on('click','.delete_estimate',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.ids').text());
            $('.estimate_number').val(_this.find('.estimate_number').text());
        });
    </script>
@endsection


