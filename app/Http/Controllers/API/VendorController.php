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
        $id = $request->input('id');
        $limit = $request->input('limit', 5);
        $vendor_name = $request->input('vendor_name');
        $tag_name = $request->input('tag_name');

        if($id)
        {
            $vendor = Vendor::with('tags')->find($id);

            if($vendor)
                return ResponseFormatter::success($vendor, 'Data vendor berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data vendor gagal diambil', 404);            
        }

        $vendor = Vendor::with('tags');

        if($vendor_name)
        {
            $vendor->where('name', 'like', '%' . $vendor_name . '%');

            if($vendor)                
                return ResponseFormatter::success($vendor->paginate($limit), 'Data vendor berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data vendor gagal diambil', 404); 
        }

        if($tag_name)
        {    
            $vendor->where('name', 'like', '%' . $tag_name . '%');

            if($vendor)                
                return ResponseFormatter::success($vendor->paginate($limit), 'Data vendor berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data vendor gagal diambil', 404);            
        }
    }
}
