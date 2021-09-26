<?php

namespace App\Http\Controllers;

use App\Service\QrcodePay;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private $qrcodePay;
    public function __construct()
    {
      $this->qrcodePay = new QrcodePay();
    }

    public function index()
    {
         $products = $this->qrcodePay->getListQrcodes()['data']['data'];
         return view('product.index', compact('products'));
    }
    public function getProduct($id)
    {;
        $product = $this->qrcodePay->getQrcodeById($id)['data'];
        return view('product.show', compact('product'));
    }
}
