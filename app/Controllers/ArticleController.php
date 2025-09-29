<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ArticleController extends BaseController
{
    protected $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $data['articles'] = $this->articleModel
            ->where('top', 1)
            ->where('published', 1)
            ->orderBy('date', 'DESC')
            ->findAll();

        return view('homepage', $data);
    }

    public function show($id)
    {
        $article = $this->articleModel->find($id);
        return view('article', ['article' => $article]);
    }
}
