@extends('layouts.pharma')
@section('content')

<div class="bg-light py-3">
    <div class="container">
       <div class="row">
            <div class="col-md-12 mb-0">
                <a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Store</strong>
            </div>
       </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        @if (session('status'))
            <p class="alert alert-success">
                {{ session('status') }}
            </p>
        @endif
        <div class="row">
            @foreach($data as $d)
                <div class="col-sm-6 col-lg-4 text-center item mb-4">
                    <a href="{{ route('catalogDetail', $d->id) }}"> <img style="max-height: 180px" src="{{ asset('img/medicine-images/'.$d->image) }}" alt="Image"></a>
                    <h3 class="text-dark">{{ $d->generic_name }}</h3>
                    <h5 class="text-dark">{{ $d->form }}</h5>
                    <h4 class="price">Rp. {{ $d->price }}</h4>
                    <p><a href="{{ route('addToCart', $d->id) }}" class="buy-now btn btn-sm height-auto px-4 py-1 btn-primary">Add To Cart</a></p>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <div>
                    <div class="d-flex justify-content-center">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection