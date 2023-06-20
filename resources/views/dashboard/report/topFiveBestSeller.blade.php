@extends('layouts.startmin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">Best Seller Medicines</h1>
    </div>
</div>
    
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Generic Name</th>
                                <th>Form</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Item Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->generic_name }}</td>
                                <td>{{ $d->form }}</td>
                                <td>Rp. {{ $d->price }}</td>
                                <td>{{ $d->category_name }}</td>
                                <td>{{ $d->sold }} Pcs</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>


@endsection