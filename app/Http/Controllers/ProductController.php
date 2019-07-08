<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function getProductByName(Request $request)
    {
        $reseller = $request->reseller;
        return Product::where('name', 'like', '%'.$request->name.'%')
                        ->when($reseller==1, function ($query,$reseller ) {
                            return $query->where('reseller', $reseller);
                        })
                        ->get();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function store(Request $request){
        $product = new Product;

        $product->name = $request->name;
        $product->satuan = $request->satuan;
        $product->price = $request->price;

        $product->save();
    }

    public function update(Request $request){
        $product = Product::find($request->id);

        $product->name = $request->name;
        $product->satuan = $request->satuan;
        $product->price = $request->price;

        $product->save();
    }
}