<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;
use App\Tag;

class FoodController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 5);
        $name = $request->input('name');
        $tag = $request->input('tag');
        
        if($id == null && $name == null && $tag == null)
        {
            $food = Food::all();
            return ResponseFormatter::success($food, 'Data makanan berhasil diambil');
        }

        if($id)
        {
            $food = Food::with('tags')->find($id);

            if($food)
                return ResponseFormatter::success($food, 'Data makanan berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data makanan gagal diambil', 404);            
        }

        $food = Food::with('tags');

        if($name)
        {
            $food->where('name', 'like', '%' . $name . '%');
            
            if($food)
                return ResponseFormatter::success($food->paginate($limit), 'Data makanan berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data makanan gagal diambil', 404);               
            
        }
        
        $tags = Food::select('foods.*')->join('tags', 'foods.tag_id', 'tags.id');

        if($tag)
        {
            $tags->where('tags.name', 'like', '%' . $tag . '%');
            
            if($tags)   
                return ResponseFormatter::success($tags->paginate($limit), 'Data makanan berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data makanan tidak tersedia', 404);          
        }
       
        
    }
}
