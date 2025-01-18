<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * ホームページを表示
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $features = [
            '愛犬のプロフィール管理',
            'カスタマイズされた食事プラン',
            '栄養分析ツール',
            'ダイエット診断'
        ];

        return view('home', compact('features'));
    }
}