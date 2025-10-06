<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;

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
        $article = $this->articleModel
        ->find($id); 
        
        return view('article', ['article' => $article]); 
    }

    public function add()
    {
        return view('articles/add');
    }

    public function save()
    {
        $data = $this->request->getPost();

        $data['top'] = isset($data['top']) ? 1 : 0;
        $data['published'] = isset($data['published']) ? 1 : 0;

        if (empty($data['link'])) {
            $data['link'] = url_title($data['title'], '-', true);
        }

        $file = $this->request->getFile('photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads/articles/', $newName);
            $data['photo'] = $newName;
        }

        $this->articleModel->insert($data);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $article = $this->articleModel->find($id);
        return view('articles/edit', ['article' => $article]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        $data['top'] = isset($data['top']) ? 1 : 0;
        $data['published'] = isset($data['published']) ? 1 : 0;

        if (empty($data['link'])) {
            $data['link'] = url_title($data['title'], '-', true);
        }

        $file = $this->request->getFile('photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads/articles/', $newName);
            $data['photo'] = $newName;
        }

        $this->articleModel->update($id, $data);
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $article = $this->articleModel->find($id);
        if ($article) {
            $this->articleModel->update($id, ['published' => 0]);
        }
        return redirect()->to('/');
    }
}
