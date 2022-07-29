<?php

namespace App;
use App\Models\Article;

class AdminDataTable extends Model
{
public function __construct(protected array $model, protected array $function)
{
$this->model = Article::findAll();

}















}