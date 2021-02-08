<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Bank_Branch;
use Illuminate\Http\Request;

class BankBranchesController extends Controller
{
    public function index(){
        $branches = Bank_Branch::all();

        foreach($branches as $branch){
            $bank = Bank::where('bank_id', $branch['banks_id'])->first();
            $branch['bank_name'] = $bank->bank_name;
            $branch['bank_code'] = $bank->bank_code;

        }

        return view('index',compact('branches'));
    }


    public function edit($id){
        //get branch details
        $branch = Bank_Branch::where('branch_id',$id)->first();

        //get bank details according to branch
        $bank = Bank::where('bank_id',$branch['banks_id'])->first();
        $branch['bank_name'] = $bank['bank_name'];
        $branch['bank_code'] = $bank['bank_code'];

        //get all banks
        $banks = Bank::get();

        return view('edit',compact('branch','banks'));

    }


    public function update(Request $request, $id){
        $request->validate([
            'bank' => 'required',
            'name' => 'required|min:5|max:55',
            'code' => 'required|min:3|max:45',
            'address' => 'required|min:5'
        ]);


        $data['branch_name'] = $request->name;
        $data['branch_code'] = $request->code;
        $data['address'] = $request->address;
        $data['banks_id'] = $request->bank;

        Bank_Branch::where('branch_id',$id)->update($data);

        return redirect()->route('bank-branches.index')->with('success','You Have Successfully Edited');

    }

}
