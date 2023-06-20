@extends('layouts.pharma')
@section('content')

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="modal fade" id="modalDetail" tabindex="-1" role="basic" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">Transaction Detail</h4>
                        </div>
                        <div class="modal-body" id="msg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="product-thumbnail">Transaction Date</th>
                        <th class="product-name">Total</th>
                        <th class="product-price">Detail</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $d)
                    <tr>
                        <td>{{ $d->transaction_date }}</td>
                        <td>Rp. {{ $d->grandtotal }}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-xs" data-toggle="modal" href="#modalDetail" onclick="getDetailData({{ $d->id }})" style="color: black">
                                <i data-feather="eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        function getDetailData(id) {
            $.ajax({
                type:'POST',
                url:'{{ route("transactions.showDetailTransactionUser") }}',
                data:'_token= <?php echo csrf_token() ?> &id='+id,
                success:function(data) {
                    $("#msg").html(data.msg);
                }
            });
        }
    </script>
@endsection
