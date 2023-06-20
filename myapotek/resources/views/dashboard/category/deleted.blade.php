@extends('layouts.startmin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default page-header">
            <div class="panel-heading">
                <h1>List of Deleted Categories</h1>
            </div>
            <div class="panel-body">
                @if (count($data) == 0)
                    <h4>None of The Category has been Deleted!</h4>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr id="tr_{{ $d->id }}">
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->description }}</td>
                                        <td>
                                            <a href="{{ url('category-restored/'.$d->id) }}" class="btn btn-xs btn-info" onclick="if(!confirm('Are you sure want to restore this category data?')) return false;">Restore Data</a>
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