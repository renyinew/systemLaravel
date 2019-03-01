<?php

namespace App\Http\Controllers\Admin\Api\Article;

use Illuminate\Http\Request;
use App\Models\Admin\Api\Article;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Resources\Admin\Api\Article\ArticleResource;
use App\Http\Requests\Admin\Api\Article\StoreArticleCreate;
use App\Http\Requests\Admin\Api\Category\StoreCategoryUpdate;


class ArticleController extends Controller
{

    /**
     * @param StoreArticleCreate $create
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(StoreArticleCreate $create, Article $article)
    {
        $model = $article->create($create->all());
        $response = new ArticleResource($model);
        return response()->json($response)->setStatusCode(201);
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
     * @param StoreCategoryUpdate $update
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StoreCategoryUpdate $update, Article $article)
    {
        $article->findOrFail($id)->update($update->all());
        return response()->json()->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Article $article)
    {
        $article->findOrFail($id)->delete();
        return response()->json()->setStatusCode(204);
    }
}
