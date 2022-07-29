<?php

namespace App\Controllers;
use App\DbException;
use App\Models\Article;
class AdminController
{

    /**
     * @throws DbException
     */
    public function __invoke()
{
    $article= new Article();
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author_id =  (int)($_POST['authorId']);


    $action = array_keys($_POST);
    if (in_array('save', $action)){
        if( (empty($_POST['title'])) || (empty($_POST['content'])) || (empty($_POST['authorId'])) ){
            echo 'вы не ввели значения';
        }else{
            $article->save($_POST['id']);}

    }elseif (in_array('delete', $action)) {
        if ( empty($_POST['id']) ) {
            echo 'вы не ввели значения';
        } else {
                $article->delete($_POST['id']);
        }
    }
}

}