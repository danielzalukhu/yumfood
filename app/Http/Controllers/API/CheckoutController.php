<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Food;
use App\Transaction;
use App\TransactionDetail;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details', 'notes');
        $data['uuid'] = 'YF - ' . mt_rand(10000, 99999) . mt_rand(100, 999);

        $transaction = Transaction::create($data);

        foreach($request->transaction_details as $food)
        {
            $details[] = new TransactionDetail([
                'transaction_id' => $transaction->id,
                'food_id' => $food,
                'notes' => $request->notes,
            ]);
        }

        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}

