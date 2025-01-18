<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnalysisController extends Controller
{
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 分析結果一覧を表示
     */
    public function index(): View
    {
        $analyses = Analysis::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('analyses.index', compact('analyses'));
    }

    /**
     * 分析結果の詳細を表示
     */
    public function show(Analysis $analysis): View
    {
        // 権限チェック
        if ($analysis->user_id !== auth()->id()) {
            abort(403);
        }

        return view('analyses.show', compact('analysis'));
    }
}