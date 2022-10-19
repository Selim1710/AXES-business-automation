@extends('layouts.app')
@section('tittle')
Expenses List
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Expenses List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>

            <tr>
                <th>SN</th>
                <th>NAME</th>
                <th>TYPE</th>
                <th>DESCRIPTION</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>ggf</td>
                    <td>fg</td>
                    <td>fgf</td>
                    <td>fgf</td>



                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="" method="post"style="display:inline">

                                <input type="hidden" name="expenseshead_id" value="" >
                                <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>


            </tbody>

        </table>
    </div>
</div>
@endsection
