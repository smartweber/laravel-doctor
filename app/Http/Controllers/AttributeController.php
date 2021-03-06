<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attributes;

use Session;
use Validator;

class AttributeController extends Controller {

	public function store(Request $request){
       $rules = [
          'attributename' => 'required',
          'parentattribute' => 'required',
          'attributecharactertype' => 'required',
          'attributevalue' => 'required',
          'attributeunitvalue' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('status_error', ' Sorry, Enter again! Attribute name, Parent Attribute, Attribute character type, Attribute value, Attribute unit value is necessary item.');
            return redirect()->route('admin/attributeadd');
        }
        else{
            $attributename = $request->input('attributename');
            $parentattribute = $request->input('parentattribute');
            $attributecharactertype = $request->input('attributecharactertype');
            $attributevalue = $request->input('attributevalue');
            $attributeunitvalue = $request->input('attributeunitvalue');
            $attributedescription = $request->input('attributedescription');
 
            if (!$attributedescription) {
                $attributedescription = "";
            }
            
            $attributes = new Attributes;
            $attributes->attributename = $attributename;
            $attributes->parentattribute = $parentattribute;
            $attributes->attributecharactertype = $attributecharactertype;
            $attributes->attributevalue = $attributevalue;   
            $attributes->attributeunitvalue = $attributeunitvalue;   
            $attributes->attributedescription = $attributedescription;   

            $attributes->save();

            Session::flash('status_success', 'The information has been saved successfully.');
	        return redirect()->route('admin/attributeadd');
        }
    }// end storeAction

    public function edit_attribute(Request $request){
        $attribute_id = $request->input('attribute_id');   

        $attributename = $request->input('attributename');
        $parentattribute = $request->input('parentattribute');
        $attributecharactertype = $request->input('attributecharactertype');
        $attributevalue = $request->input('attributevalue');
        $attributeunitvalue = $request->input('attributeunitvalue');
        $attributedescription = $request->input('attributedescription');

        Attributes::where('id', $attribute_id) -> update(array( 'attributename' => $attributename, 
                                                            'parentattribute' => $parentattribute,
                                                            'attributecharactertype' => $attributecharactertype,
                                                            'attributevalue' => $attributevalue,
                                                            'attributeunitvalue' => $attributeunitvalue,
                                                            'attributedescription' => $attributedescription));

        Session::flash('status_success', 'Attribute has been updated successfully.');
        return redirect()->route('admin/attributeadd');
    }

	public function delete(Request $request){
        $attributeid = $request->input('id');
        Attributes::find($attributeid)->delete();
        // Organisations::where('id',$organisationid)->delete();

        Session::flash('status_success', 'Attribute has been deleted successfully.');

        return redirect()->route('admin/attributes');
	}
   
}