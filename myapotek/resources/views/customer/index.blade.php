@extends('layouts.pharma')
@section('content')
<div class="site-blocks-cover" style="background-image: url('pharma/images/hero_1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                <div class="site-block-cover-content text-center">
                    <h2 class="sub-title">Effective Medicine For Your Health</h2>
                    <h1>Welcome To My Apotek</h1>
                    <p>
                        <a href="{{ route('catalogs') }}" class="btn btn-primary px-5 py-3">Shop Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">BEST SELLER MEDICINE</h2>
            </div>
        </div>
        <div class="row">
            @foreach( $data as $d )
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <a href="{{ route('catalogDetail', $d->id) }}"> <img src="{{ asset('img/medicine-images/'.$d->image) }}" alt="{{ $d->generic_name }}" style="height: 300px; width: 300px;"></a>
                <h3 class="text-dark"><a href="{{ route('catalogDetail', $d->id) }}">{{ $d->generic_name }}</a></h3>
                <h5 class="text-dark">{{ $d->form }}</h5>
                <p class="price">Rp. {{ $d->price }}</p>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('catalogs') }}" class="btn btn-primary px-4 py-3">View All Products</a>
            </div>
        </div>
    </div>
</div>
@endsection