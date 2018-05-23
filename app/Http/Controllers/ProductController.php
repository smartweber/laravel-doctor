<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;

use Session;
use Validator;

class ProductController extends Controller {

	public function store(Request $request){
       $rules = [
          'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('status_error', ' Sorry, Enter again! Name is necessary item.');
            return redirect()->route('admin/productadd');
        }
        else{
            $name = $request->input('name');
            $identitycode = $request->input('identitycode');
            $description = $request->input('description');
            $productimage = $request->input('productimage');

            if (!$description) {
                $description = "";
            }
            
            $products = new Products;
            $products->name = $name;
            $products->identitycode = $identitycode;
            $products->description = $description;
            $products->productimage = $productimage;   

            $products->save();

            Session::flash('status_success', 'The information has been saved successfully.');
	        return redirect()->route('admin/productadd');
        }
    }// end storeAction

    public function edit_product(Request $request){
        $product_id = $request->input('product_id');   

        $name = $request->input('name');
        $identitycode = $request->input('identitycode');
        $description = $request->input('description');
        $productimage = $request->input('productimage');

        Products::where('id', $product_id) -> update(array( 'name' => $name, 
                                                            'identitycode' => $identitycode,
                                                            'description' => $description,
                                                            'productimage' => $productimage));

        Session::flash('status_success', 'Product has been updated successfully.');
        return redirect()->route('admin/productadd');
    }

	public function delete(Request $request){
        $productid = $request->input('id');
        Products::find($productid)->delete();
        // Organisations::where('id',$organisationid)->delete();

        Session::flash('status_success', 'Product has been deleted successfully.');

        return redirect()->route('admin/go_products');
	}
   
}