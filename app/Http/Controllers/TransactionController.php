<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transactions;

use Session;
use Validator;

class TransactionController extends Controller {

	public function store(Request $request){
       $rules = [
          'name' => 'required',
          'payee' => 'required',
          'beneficiary' => 'required',
          'transactiontype' => 'required',
          'transactionvalue' => 'required',
          'currency' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('status_error', ' Sorry, Enter again! Name, Payee, Beneficiary, Transaction Type, Transaction value, Currency is necessary item.');
            return redirect()->route('admin/transactionadd');
        }
        else{
            $name = $request->input('name');
            $payee = $request->input('payee');
            $beneficiary = $request->input('beneficiary');
            $transactiontype = $request->input('transactiontype');
            $transactionvalue = $request->input('transactionvalue');
            $currency = $request->input('currency');
            $datesent = $request->input('datesent');
            $datereceived = $request->input('datereceived');
            $description = $request->input('description');
            $transactionnumber = $request->input('transactionnumber');

            if (!$description) {
                $description = "";
            }
            
            $transactions = new Transactions;
            $transactions->name = $name;
            $transactions->payee = $payee;
            $transactions->beneficiary = $beneficiary;
            $transactions->transactiontype = $transactiontype;   
            $transactions->transactionvalue = $transactionvalue;   
            $transactions->currency = $currency;   
            $transactions->datesent = $datesent;   
            $transactions->datereceived = $datereceived;   
            $transactions->description = $description;   
            $transactions->transactionnumber = $transactionnumber;   
     
            $transactions->save();

            Session::flash('status_success', 'The information has been saved successfully.');
	        return redirect()->route('admin/transactionadd');
        }
    }// end storeAction

    public function edit_transaction(Request $request){
        $transaction_id = $request->input('transaction_id');   

        $name = $request->input('name');
        $payee = $request->input('payee');
        $beneficiary = $request->input('beneficiary');
        $transactiontype = $request->input('transactiontype');
        $transactionvalue = $request->input('transactionvalue');
        $currency = $request->input('currency');
        $datesent = $request->input('datesent');
        $datereceived = $request->input('datereceived');
        $description = $request->input('description');
        $transactionnumber = $request->input('transactionnumber');

        Transactions::where('id', $transaction_id) -> update(array( 'name' => $name, 
                                                                    'payee' => $payee,
                                                                    'beneficiary' => $beneficiary,
                                                                    'transactiontype' => $transactiontype,
                                                                    'transactionvalue' => $transactionvalue,
                                                                    'currency' => $currency,
                                                                    'datesent' => $datesent,
                                                                    'datereceived' => $datereceived,
                                                                    'description' => $description,
                                                                    'transactionnumber' => $transactionnumber));

        Session::flash('status_success', 'Transaction has been updated successfully.');
        return redirect()->route('admin/transactionadd');
    }

	public function delete(Request $request){
        $transactionid = $request->input('id');
        Transactions::find($transactionid)->delete();
        // Organisations::where('id',$organisationid)->delete();

        Session::flash('status_success', 'Product has been deleted successfully.');

        return redirect()->route('admin/transactions');
	}
   
}