@extends('layouts.pharma')
@section('content')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <a href="{{ route('catalogs') }}">Catalog</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $data -> generic_name }}, {{ $data -> form }}</strong>
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
            <div class="col-md-5 mr-auto">
                <div class="border text-center">
                    <img src="{{ asset('img/medicine-images/'.$data->image) }}" alt="Image" class="img-fluid p-5">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-black">{{ $data -> generic_name }}, {{ $data -> form }}</h2>
                <p>{{ $data -> description }}</p>
                <p></p><strong class="text-primary h4">Rp. {{ $data -> price }}</strong></p>
                <p><a href="{{ route('addToCart', $data->id) }}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p>

                <div class="mt-5"></div>
                    <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">Fasilitas Kesehatan</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Category</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <table class="table custom-table">
                                <thead>
                                    <th>Fasilitas Kesehatan 1</th>
                                    <th>Fasilitas Kesehatan 2</th>
                                    <th>Fasilitas Kesehatan 3</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if($data -> faskes1 == 1)
                                            <th style="text-align: center"> <span<i data-feather="check"></i></span></th>
                                        @endif

                                        @if($data -> faskes2 == 1)
                                            <th style="text-align: center"> <span><i data-feather="check"></i></span></th>
                                        @endif

                                        @if($data -> faskes3 == 1)
                                            <th style="text-align: center"> <span><i data-feather="check"></i></span></th>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <table class="table custom-table">
                                <tbody>
                                    <tr>
                                        <td>Name :</td>
                                        <td class="bg-light">{{ $data ->category->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
