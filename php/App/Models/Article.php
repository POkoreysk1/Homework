<?php

namespace App\Models;

use App\Model;
use App\Models\Author;
class Article extends Model
{
    public const TABLE = 'news';
    public $title;
    public $content;
    public $author_id;
    public static function getAuthorIdByArticleId($articleId)
    {
        $aurthorId = Article::findById($articleId)->author_id;
        return $aurthorId;

    }

    public static function getAuthorName($articleId)
    {

        return Author::findById(self::getAuthorIdByArticleId($articleId));

    }

}