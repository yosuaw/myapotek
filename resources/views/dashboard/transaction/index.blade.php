@extends('layouts.startmin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Transaction History</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of Transaction
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="modal fade" id="modalDetail" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">Transaction Detail</h4>
                                </div>
                                <div class="modal-body" id="msg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Transaction Date</th>
                                <th>Total</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach($data as $d)
                            <tr>
                                <td>{{  $d->id }}</td>
                                <td>{{ $d->user->name }}</td>
                                <td>{{ $d->transaction_date }}</td>
                                <td>Rp. {{ $d->grandtotal }}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-xs" data-toggle="modal" href="#modalDetail" onclick="getDetailData({{ $d->id }})">
                                        <i class="fa fa-eye"></i>
                                    </a>
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
        function getDetailData(id) {
            $.ajax({
                type:'POST',
                url:'{{route("transactions.showDetail")}}',
                data:'_token= <?php echo csrf_token() ?> &id='+id,
                success:function(data) {
                    $("#msg").html(data.msg);
                }
            });
        }
    </script>
@endsection
