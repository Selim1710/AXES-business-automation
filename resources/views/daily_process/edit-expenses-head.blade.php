@extends('layouts.app')
@section('content')
    <div class="mb-4"></div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">
                        Edit Expenses Head
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="card" style="width: 500px">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form method="POST" action="">
                        <div class="col-12">
                            <label class="form-label">NAME</label>
                            <input type="text" class="form-control" name="name"  value="" placeholder="Name">
                        </div>
                        <br>
                        <div class="col-12">
                            <label class="form-label">TYPE</label>
                            <input type="text" class="form-control" name="name" value="" placeholder="Type">
                        </div>
                        <br>
                        <div class="col-12">
                            <label class="form-label">DESCRIPTION</label>
                            <input type="text" class="form-control" name="name" value=""placeholder="Description">
                        </div>
                        <br>

                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
