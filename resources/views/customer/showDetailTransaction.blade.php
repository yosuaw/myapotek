<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Transaction ID: {{ $data->id }} - {{ $data->transaction_date }}</b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-thumbnail">Generic Name</th>
                            <th class="product-name">Category</th>
                            <th class="product-name">Price</th>
                            <th class="product-name">Quantity</th>
                            <th class="product-price">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($medicines as $li)
                        <tr>
                            <td>
                                <img style="max-width: 200px" src="{{ asset('img/medicine-images/'.$li->image) }}">
                            </td>
                            <td>{{ $li->generic_name }}</td>
                            <td>{{ $li->category->name }}</td>
                            <td>Rp. {{ $li->price }}</td>
                            <td>{{ $li->pivot->quantity }}</td>
                            <td>Rp. {{ $li->pivot->subtotal }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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

