<?php

namespace App\Http\Controllers\Admin\Api\Article;

use Illuminate\Http\Request;
use App\Models\Admin\Api\Article;
use App\Http\Controllers\Admin\Api\Controller;

class MineController extends Controller
{
    /**
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate(Request $request, Article $article)
    {
        $user = $request->user();
        return response()->json(
            $article->where('user_id', $user->id)->paginate()
        )->setStatusCode(200);
    }
}
