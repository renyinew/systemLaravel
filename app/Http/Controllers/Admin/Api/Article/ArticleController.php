<?php

namespace App\Http\Controllers\Admin\Api\Article;

use App\Models\Admin\Api\Article;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\Article\ArticleResource;
use App\Http\Requests\Admin\Api\Article\StoreArticleCreate;
use App\Http\Requests\Admin\Api\Article\StoreArticleUpdate;

class ArticleController extends Controller
{
    /**
     * @param StoreArticleCreate $create
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(StoreArticleCreate $create, Article $article)
    {
        // 获取用户信息
        $user = $create->user();

        // 获取表单提交信息
        $articleData = $create->all();
        $articleData['user_id'] = $user->id;

        // 文章入库
        $article->create($articleData);
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate(Article $article)
    {
        $articleData = $article->paginate();
        return response()->json($articleData)->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function view($id, Article $article)
    {
        $model = $article->findOrFail($id);
        $response = new ArticleResource($model);
        return response()->json($response)->setStatusCode(200);
    }

    /**
     * @param $id
     * @param StoreArticleUpdate $update
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StoreArticleUpdate $update, Article $article)
    {
        $article->findOrFail($id)->update($update->all());
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function trash($id, Article $article)
    {
        $article->findOrFail($id)->delete();
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function regain($id, Article $article)
    {
        $article->withTrashed()->findOrFail($id)->restore();
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Article $article)
    {
        $article->withTrashed()->findOrFail($id)->forceDelete();
        return response()->json()->setStatusCode(204);
    }
}
