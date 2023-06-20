<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Transaction ID: {{ $data->id }} - {{ $data->transaction_date }}</b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body display-flex">
                @foreach ($medicines as $li)
                    <div class="col-lg-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ asset('img/medicine-images/'.$li->image) }}">
                            <div class="caption">
                                <p style="align-items: center"><b>{{ $li->generic_name }}</b></p>
                                <hr>
                                <p>Category: {{ $li->category->name }}</p>
                                <p>Price: Rp. {{ $li->price }}</p>
                                <p>Quantity: {{ $li->pivot->quantity }}</p>
                                <p>Subtotal: Rp. {{ $li->pivot->subtotal }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- /.panel-body -->
            <div class="panel-footer" style="text-align: right;">
                <p><strong>Total Rp. {{ $data->grandtotal }}</strong></p>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
