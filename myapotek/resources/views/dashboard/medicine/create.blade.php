@extends('layouts.startmin')
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
                        <form role="form">
                            <div class="form-group">
                                <label>Generic Name</label>
                                <input class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Form</label>
                                <input class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Restriction Formula</label>
                                <input class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control">
                                    @foreach($data as $c) 
                                        <option>{{ $c -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Faskes</label>
                                <div class="checkbox">
                                    <label id="faskes1">
                                        <input type="checkbox" value="1" id="faskes1" name="faskes1">Faskes 1
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label id="faskes2">
                                        <input type="checkbox" value="1" id="faskes2" name="faskes2">Faskes 2
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label id="faskes3">
                                        <input type="checkbox" value="1" id="faskes3" id="faskes3">Faskes 3
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection