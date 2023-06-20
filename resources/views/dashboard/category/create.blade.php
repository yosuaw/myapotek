{{-- @extends('layouts.startmin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">Create New Medicine</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input the necessary data below.
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection --}}
<div class="modal-header">
    <h4 class="modal-title" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">Edit Category</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div style="padding: 15px">
            <form role="form" method="post" action="{{ route('categories.store') }}" >
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" value="{{ $data->name }}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="5" style="resize: none">{{ $data->description }}</textarea>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Create</button>
    <a class="btn btn-default" data-dismiss="modal">Cancel</a>
</div>