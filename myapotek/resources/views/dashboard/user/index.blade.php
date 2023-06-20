@extends('layouts.startmin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Customer Catalog
        </h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="alert alert-success" id="pesan" style="display: none"></div>
        <div class="alert alert-danger" id="error" style="display: none"></div>

        @if (session('error'))
            <div class="alert alert-danger">
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
                List of Customers
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <tr class="odd gradeX" id="tr_{{ $d->id }}">
                                    <td>{{ $d -> id  }}</td>
                                    <td id="td_name_{{ $d -> id }}">{{ $d -> name }}</td>
                                    <td id="td_email_{{ $d -> id }}">{{ $d -> email }}</td>

                                    <td>
                                        <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" id="modalContent"></div>
                                            </div>
                                        </div>
                                        <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-warning" onclick="getEditForm({{ $d->id }})"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-danger" onclick="if(confirm('Are you sure to delete this customer?')) deleteData({{ $d->id }})"><i class="fa fa-trash-o"></i></a>
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
    function clearError(el){
        $("#"+el+" .alert ul").html("");
        $("#"+el+" .alert").hide();
    }

    function getEditForm(id) {
        $.ajax({
            type:'POST',
            url:'{{route("users.getEditForm")}}',
            data:'_token= <?php echo csrf_token() ?> &id='+id,
            success:function(data) {
                $("#modalContent").html(data.msg);
            }
        });
      }

    function saveDataUpdateTD(id) {
        var eName = $('#usName').val();
        var eEmail = $('#usEmail').val();
        $.ajax({
            type:'POST',
            url:'{{route("users.saveData")}}',
            data:{'_token': '<?php echo csrf_token() ?>',
                    'id':id,
                    'name':eName,
                    'email':eEmail
                },
            success:function(data) {
                if(data.status==200){
                    $('#td_name_'+id).html(eName);
                    $('#td_email_'+id).html(eEmail);

                    $('#pesan').show();
                    $('#pesan').html(data.msg);
                    setTimeout(function() {
                        $("#pesan").hide();
                    }, 5000);
                }else{
                    $('#error').show();
                    $('#error').html(data.msg);
                    setTimeout(function() {
                        $("#error").hide();
                    }, 5000);
                }
                $('body').removeClass('modal-open');
                $('#modalEdit').modal('hide');
            },
            error: function(xhr){
                clearError("modalEdit");
                data = JSON.parse(xhr.responseText);
                for (var k in data.errors){
                    console.log(data.errors[k]);
                    $("#modalEdit .alert ul").append(`<li>`+data.errors[k][0]+`</li>`);
                }
                $("#modalEdit .alert").show();
            }
        });
    }

    function deleteData(id) {
      $.ajax({
          type:'POST',
          url:'{{route("users.deleteData")}}',
          data:'_token= <?php echo csrf_token() ?> &id='+id,
          success:function(data) {
              if(data.status=='oke'){
                $('#tr_'+id).remove();

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
