<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    // フォームの表示
    public function create()
    {
        return view('materials.create');
    }

    // データ登録処理
    public function store(Request $request)
    {
        // dd($request);
        // バリデーション
        $validated = $request->validate([
            'name.*' => 'required|string|max:255',
            'unit.*' => 'required|string|max:50',
            // 'nutrient_1' => 'nullable|numeric',
            // 'nutrient_2' => 'nullable|numeric',
        ]);

        // データベースに保存
        $new_array = [];

        

        foreach($validated as $key=>$item):
            foreach($item as $index =>$value){   
                $new_array[$index][$key] = $value; 
            }
        endforeach;


        foreach ($new_array as $data) {
            Material::create($data);
        }

        // リダイレクト
        return redirect()->route('materials.create')->with('success', 'データが登録されました！');
    }
}
