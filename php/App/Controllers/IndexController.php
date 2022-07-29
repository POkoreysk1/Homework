<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\Model;

class IndexController extends Controller
{
protected function handle()
{

    $articles = Article::findAll();

    $body = $this->getTwig()->render('/index.twig', [
        'articles' => $articles,
    ]);

    echo $body;
}
}