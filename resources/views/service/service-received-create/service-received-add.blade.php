@extends('layouts.app')
@section('tittle')
    Service Received Create
@endsection
@section('content')
    <div class="row" style=" margin-top: 20px;">
        <div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="border p-3 rounded">
                <h6 class="mb-0 text-uppercase"style="text-align: center">Service Received Create</h6>
                <hr/>
                <form class="row g-3">
                    <div class="col-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">First Name</label>
                        <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Last Name</label>
                        <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="submit">
                    </div>

                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection
