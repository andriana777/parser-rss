<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'category',
        'link',
        'author',
        'guid',
        'pubDate'
    ];

//    public function __construct(object $item)
//    {
//        $this->title = (string) $item->title;
//        $this->description = (string) $item->description;
//        $this->category = (string) $item->category;
//        $this->link = (string) $item->link;
//        $this->author = (string) $item->author;
//        $this->guid = (string) $item->guid;
//        $this->pubDate = (string) $item->pubDate;
//    }

public function setProperties(object $item){
    $this->title = (string) $item->title;
        $this->description = (string) $item->description;
        $this->category = (string) $item->category;
        $this->link = (string) $item->link;
        $this->author = (string) $item->author;
        $this->guid = (string) $item->guid;
        $this->pubDate = (string) $item->pubDate;
}

public function search()
{

}
}
