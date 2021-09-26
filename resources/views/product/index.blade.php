@extends('layout')
@section('content')
    <div class="row row-cols-1 row-cols-md-2">
        @foreach ($products as $product)
            <div class="col mb-4">
                <div class="card">
                    <img src="{{$product['link']['qrcode_link']}}" style="width: 200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product['product_name']}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$product['amount']}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{$product['company_name']}}</h6>
                        <a href="{{route('products.show', $product['id'])}}" class="btn btn-success">Buy now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
