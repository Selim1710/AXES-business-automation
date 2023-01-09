@extends('layouts.app')
@section('content')


 <!-- End Modal Profile-->
 <!-- Breadcrumb-->
 <div class="breadcrumb-holder">
     <div class="container-fluid">
         <ul class="breadcrumb">

         </ul>
     </div>
 </div>
 <br>
 <section class="forms">
     <div class="container-fluid">
         @if(session()->has('success'))
             <div class="alert alert-success">
                 {{ session()->get('success') }}
             </div>
         @endif
         <form  action="" method ="POST">
             @csrf
             <br>
             <div class="container">
                 <div class="row">
                     <div class="container-fluid">
                         <div class="form-group row">
                             <label for="date" class="col-form-label col-sm-2">Date Of Birth From</label>
                             <div class="col-sm-3">
                                 <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                             </div>
                             <label for="date" class="col-form-label col-sm-2">Date Of Birth To</label>
                             <div class="col-sm-3">
                                 <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="date" class="col-form-label col-sm-2">Other</label>
                             <div class="col-sm-3">
                                 <input type="text" class="form-control input-sm" id="other" name="other"placeholder="Search other..." />
                             </div>
                             <div class="col-sm-2">
                                 <button type="submit" class="btn" name="search" title="Search"><img src="https://img.icons8.com/android/24/000000/search.png"/></button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <br>
         </form>
         <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
             <thead>
             <tr>
                 <th>ID</th>
                 <th>Name</th>
                 <th>Sex</th>
                 <th>Date Of Brith</th>
                 <th>Email Address</th>
                 <th>Phone Number</th>
                 <th>Position</th>
                 <th>Salary</th>
                 <th>Modefy</th>
             </tr>
             </thead>
             <tbody>

             </tbody>
         </table>
     </div>
 </section>

 <!-- Modal Update-->
 <div class="modal fade" id="update" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header text-write">
                 <h4 class="modal-title">Update</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-close"></i></span>
                 </button>
             </div>
<!-- form delete end -->
         </div>
     </div>
 </div> <!-- End Modal Delete-->
<!-- JavaScript files-->


<script src="{{asset('report')}}/assets/vendor/chart.js/Chart.min.js"></script>
<script src="{{asset('report')}}/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('report')}}/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{asset('report')}}/assets/js/charts-home.js"></script>

<!-- for export all -->
<script src="{{asset('report')}}/assets1/js/plugins/dataTables/datatables.min.js"></script>


<script>
    // select update js
    $(document).on('click', '.edit', function()
    {
        var _this = $(this).parents('tr');
        $('#id').val(_this.find('.id').text());
        $('#e_name').val(_this.find('.name').text());
        $('#e_sex').val(_this.find('.sex').text());
        $('#e_dateOfBirth').val(_this.find('.dateOfBirth').text());
        $('#e_email').val(_this.find('.email').text());
        $('#e_phone').val(_this.find('.phone').text());
        $('#e_jobPosition').val(_this.find('.jobPosition').text());
        $('#e_salary').val(_this.find('.salary').text());
    });
</script>

<!-- validate form employee -->
<script>
    $("#validateForm").validate({
        rules: {
            name: {
                required: true,
            },
            sex: {
                required: true,
            },
            dateOfBirth: {
                required: true,
            },
            email: {
                required: true,
            },
            phone: {
                required: true,
            },
            jobPosition: {
                required: true,
            },
            salary: {
                required: true,
            },

        },
        messages: {
            name: {
                required: "Please enter full name",
            },
            sex: {
                required: "Please enter sex",
            },
            dateOfBirth: {
                required: "Please enter date of birth",
            },
            email: {
                required: "Please enter your email",
            },
            phone: {
                required: "Please enter phone",
            },
            jobPosition: {
                required: "Please enter your position",
            },
            salary: {
                required: "Please enter salary",
            },

        },
    });
</script>

<!-- export Scripts -->
<script>
    $(document).ready(function(){
        $('#example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]
        });
    });

</script>
<!-- Main File-->
<script src="{{asset('report')}}/assets/js/front.js"></script>




@endsection
