@extends('layout')
@section('content')
    <div class="row">
        <h2>
            Checkout
        </h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pay with paystack</div>
                <div class="card-body">
                    <h5 class="card-title">{{$product['product_name']}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$product['amount']}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">{{$product['company_name']}}</h6>
                    <a href="{{$product['link']['payment_page_link']}}" class="btn btn-primary">Pay now</a>
                </div>
            </div>
        </div>
       <div class="col-md-4">
           <div class="card">
               <div class="card-header">Pay with QRCode</div>
               <div class="card-body">
                   <h5 class="card-title">{{$product['product_name']}}</h5>
                   <img src="{{$product['link']['qrcode_link']}}" style="width: 200px" class="card-img-top" alt="...">
                <h4 class="mt-3"> Scan the QRcode above to pay</h4>
               </div>
           </div>
       </div>
    </div>
@endsection
