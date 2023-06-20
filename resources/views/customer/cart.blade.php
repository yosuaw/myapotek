@extends('layouts.pharma')
@section('content')
<div class="site-section">
    <div class="container">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Generic Name</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Subtotal</th>
                            <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0?>
                        @if(session('cart'))
                            @foreach(session('cart') as $id=>$d)
                            <?php $total += $d['price'] * $d['quantity'] ?>
                            <tr id="tr_cart_{{ $id }}">
                                <td class="product-thumbnail">
                                    <img src="{{ asset('img/medicine-images/'. $d['photo']) }}" alt="Image" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">{{ $d['name'] }}</h2>
                                </td>
                                <td class="product-price">Rp. {{ $d['price'] }}</td>
                                <td>
                                    {{ $d['quantity'] }}
                                </td>
                                <td>Rp. {{ $d['price'] * $d['quantity'] }}</td>
                                <td><a  href="#" class="btn btn-danger" onclick="deleteData({{ $id }},{{ $d['price'] * $d['quantity'] }})"><i data-feather="trash-2"></a></td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
            <div class="row mb-5">
                <div class="col-md-6">
                <a href="{{ route('catalogs') }}" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>
                </div>
            </div>
            </div>
            <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
                <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Total</h3>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                    <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                    <span>Rp. </span><strong class="text-black" id="total">{{ $total }}</strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('checkouts') }}" class="btn btn-primary btn-lg btn-block">
                            Proceed To Checkout
                        </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteData(id, price) {
      $.ajax({
          type:'POST',
          url: '{{ route("removeFromCart") }}',
          data: {'_token':'<?php echo csrf_token() ?>',
            'id':id,
        }
        ,success:function(data) {
              if(data.status==200){
                $('#tr_cart_'+id).remove();
                var total = parseInt($('#total').html()) - price;
                $('#total').html(total);
              }
          }
      });
    }
</script>
@endsection
