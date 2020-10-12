<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor;
use App\Tag;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 5);
        $vendor_name = $request->input('vendor_name');
        $tag_name = $request->input('tag_name');

        $vendor = Vendor::with('tags');

        if($tag_name)
        {    
            $vendor->where('name', 'like', '%' . $tag_name . '%');

            if($vendor)                
                return ResponseFormatter::success($vendor->paginate($limit), 'Data makanan berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data makanan gagal diambil', 404);            
        }
    }
}
