@extends('layouts.startmin')
@section('content')
<div class="row">
    <div class="col-lg-12" id="createData">
        <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Create New Category</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" ></form>
                            <div class="alert alert-danger" style="display: none">
                                <ul>

                                </ul>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="desc" class="form-control" style="resize: none"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="saveDataCreateTD();">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearData();">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modalContent"></div>
            </div>
        </div>
        <h1 class="page-header">Category Catalog
            <a href="#modalCreate" data-toggle="modal" class="btn btn-success" style="float: right;">Create New Categories</a>
        </h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="alert alert-success" id="pesan" style="display: none"></div>
        <div class="alert alert-danger" id="error" style="display: none"></div>

        @if (session('error'))
            <div class="alert alert-danger" id="status">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of Categories
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach($data as $d)
                            <tr id="tr_{{ $d->id }}">
                                <td>{{ $d->id }}</td>
                                <td id="td_name_{{ $d->id }}">{{ $d->name }}</td>
                                <td id="td_description_{{ $d->id }}">{{ $d->description }}</td>
                                <td>
                                    <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-warning" onclick="getEditForm({{ $d->id }})"><i class="fa fa-pencil"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-danger" onclick="if(confirm('Are you sure to delete this record?')){ deleteData({{ $d->id }})} else {return false;}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection

@section('javascript')
<script>
    function clearData(){
        //Clear Error
        clearError("modalCreate");
        $(':input').val('');
    }

    function clearError(el){
        $("#"+el+" .alert ul").html("");
        $("#"+el+" .alert").hide();
    }

    function saveDataCreateTD(){
        $.ajax({
            type:'POST',
            url:'{{ route("categories.store") }}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'name':$("#name").val(),
                'description':$("#desc").val()
                },
            success: function(data){
                if (data.status==200){
                    var newData = `
                                <tr id="tr_`+data.id+`">
                                <td>`+data.id+`</td>
                                <td id="td_name_`+data.id+`">`+$("#name").val()+`</td>
                                <td id="td_description_`+data.id+`">`+$("#desc").val()+`</td>
                                <td>
                                    <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-warning" onclick="getEditForm(`+data.id+`)"><i class="fa fa-pencil"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-danger" onclick="if(confirm('Are you sure to delete this record?')) deleteData(`+data.id+`)"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>`;
                    $('#table-body').append(newData);
                    $('#name').val('');
                    $('#desc').val('');
                }

                clearData();

                $('#pesan').show();
                $('#pesan').html(data.msg);
                setTimeout(function() {
                    $("#pesan").hide();
                }, 5000);

                $('body').removeClass('modal-open');
                $('#modalCreate').modal('hide');
            },
            error: function(xhr){
                if (xhr.status == 422){
                    data = JSON.parse(xhr.responseText);
                    clearError("modalCreate");
                    for (var k in data.errors){
                        $("#modalCreate .alert ul").append(`<li>`+data.errors[k][0]+`</li>`);
                    }
                    $("#modalCreate .alert").show();
                }else{
                    data = JSON.parse(xhr.responseText);
                    $('#error').show();
                    $('#error').html(data.msg);
                    setTimeout(function() {
                        $("#error").hide();
                    }, 5000);
                    $('body').removeClass('modal-open');
                }
            }
        });
    }

    function saveDataUpdateTD(id){
        var name = $("#catName").val();
        var description = $("#catDesc").val();
        $.ajax({
            type:'POST',
            url:'{{ route("categories.saveData") }}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'id':id,
                'name':name,
                'description':description
                },
            success: function(data){
                if (data.status==200){
                    $('#td_name_'+id).html(name);
                    $('#td_description_'+id).html(description);

                    $('#pesan').show();
                    $('#pesan').html(data.msg);
                    setTimeout(function() {
                        $("#pesan").hide();
                    }, 5000);
                }
                else {
                    $('#error').show();
                    $('#error').html(data.msg);
                    setTimeout(function() {
                        $("#error").hide();
                    }, 5000);
                }
                $('#modalEdit').modal('hide');
            },
            error: function(xhr){
                data = JSON.parse(xhr.responseText);
                clearError("modalEdit");
                for (var k in data.errors){
                    console.log(data.errors[k]);
                    $("#modalEdit .alert ul").append(`<li>`+data.errors[k][0]+`</li>`);
                }
                $("#modalEdit .alert").show();
            }
        });
    }

    function getEditForm(id)
    {
        $.ajax({
            type:'POST',
            url:'{{ route("categories.getEditForm") }}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'id':id
                },
            success: function(data){
                $('#modalContent').html(data)
            }
        });
    }

    function deleteData(id)
    {
        $.ajax({
            type:'POST',
            url:'{{ route("categories.deleteData") }}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'id':id
                },
            success: function(data){
                if(data.status == 'oke') {
                    $('#tr_' + id).remove();
                    $('#pesan').show();
                    $('#pesan').html(data.msg);
                    setTimeout(function() {
                        $("#pesan").hide();
                    }, 5000);
                }
                else{
                    $('#error').show();
                    $('#error').html(data.msg);
                    setTimeout(function() {
                        $("#error").hide();
                    }, 5000);
                }
            }
        });
    }
</script>
@endsection
