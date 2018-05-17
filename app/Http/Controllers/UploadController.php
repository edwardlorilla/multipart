<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class UploadController extends Controller
{
    public function uploadSubmit(Request $request)
    {
        $product = \App\Product::create($request->all());
        foreach ($request->photos as $photo) {
            $destinationPath = 'uploads';
            $filename = $photo->move($destinationPath,$photo->getClientOriginalName());
            \App\ProductsPhoto::create([
                'product_id' => $product->id,
                'filename' => $filename
            ]);
        }
        return 'Upload successful!';
    }
}
