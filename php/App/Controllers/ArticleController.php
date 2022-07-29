<?php

namespace App\Controllers;


use App\Controller;
use App\Models\Article;


class ArticleController extends Controller
{
    public function handle()
    {

        $article = Article::findById($_GET['id']);
        $author = Article::getAuthorName($_GET['id']);
        $content = $this->getTwig()->render('/article.twig', [
            'article' => $article,'author' => $author,
        ]);

        echo $content;
    }
}



