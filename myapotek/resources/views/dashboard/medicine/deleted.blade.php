@extends('layouts.startmin')
@section('content')
<div class="row"></div>
    <div class="col-lg-12">
        <div class="panel panel-default page-header">
            <div class="panel-heading">
                <h1>List of Deleted Medicines</h1>
            </div>
            <div class="panel-body">
                @if (count($data) == 0)
                    <h4>None of The Medicine has been Deleted!</h4>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Generic Name</th>
                                    <th>Form</th>
                                    <th>Restriction Formula</th>
                                    <th>Price</th>
                                    <th>Faskes 1</th>
                                    <th>Faskes 2</th>
                                    <th>Faskes 3</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr class="odd gradeX">
                                        <td>{{ $d -> id  }}</td>
                                        <td>{{ $d -> generic_name }}</td>
                                        <td>{{ $d -> form }}</td>
                                        <td>{{ $d -> restriction_formula }}</td>
                                        <td>{{ $d -> price }}</td>
                                        <td>
                                            @if ($d -> faskes1 == 1)
                                                <div style="text-align: center;">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($d -> faskes2 == 1)
                                                <div style="text-align: center;">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($d -> faskes3 == 1)
                                                <div style="text-align: center;">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $catWithThrased[$d->category_id -1]->name }}</td>
                                        <td>
                                            <a href="{{ url('medicine-restored/'.$d->id) }}" class="btn btn-xs btn-info" onclick="if(!confirm('Are you sure want to restore this medicine data?')) return false;">Restore Data</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection