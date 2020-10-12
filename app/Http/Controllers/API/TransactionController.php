<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $food = Transaction::with(['details.food'])->find($id);

        if($food)
            return ResponseFormatter::success($food, 'Data transaksi berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data transaksi tidak ada', 404);  
    }
}
