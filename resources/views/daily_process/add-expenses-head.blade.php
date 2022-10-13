@extends('layouts.app')
@section('tittle')
    Add Expenses Head
@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Add Expenses Head</h3>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="row ">

                <div class="col-md-7 m-auto">
                    <div class="card offset-2">
                        <div class="card-body">
                            <form action="action.php" method="post">
                                <label for="" class="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. Electric Bill"><br>
                                <label for="" class="">Expenses Type</label>
                                <input type="text" name="name" class="form-control" placeholder="Expenses Type"><br>

                                <label for="" class="">Description</label>

                                <textarea name="address" class="form-control" id="" cols="30" rows="10"></textarea>

                                <button type="button" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger">Close</button>

                            </form>

                        </div>

                    </div>

                </div>


            </div>
        </div>
    </section>
@endsection
