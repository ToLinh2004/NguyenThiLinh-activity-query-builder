<?php

namespace App\Models;
use PDO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    public function createPost($id, $title, $description)
    {
        $mysql=DB::insert("INSERT INTO posts (id, title, description) VALUES (?, ?, ?)", [$id, $title, $description]);
        $pdo = DB::connection()->getPdo()->prepare("INSERT INTO posts (id, title, description) VALUES (?, ?, ?)");
        $pdo->execute([$id, $title, $description]);
        return $mysql;
    }
    public function getAllPosts(){
        $posts=DB::table('posts')->get();
        return $posts;
    }
    public function getOnePost($id){
        $post=DB::table('posts')->find($id);
        $mysql= DB::select("SELECT * FROM posts WHERE id=?",[$id]);
        $pdo = DB::connection()->getPdo()->prepare("SELECT * FROM posts WHERE id = ?");
        $pdo->execute([$id]);
        $result = $pdo->fetch(PDO::FETCH_ASSOC);
        return  $pdo;
    }
    public function updatePost($id, $title, $description)
    {
        $mysql=DB::update("UPDATE posts SET title = ?, description = ? WHERE id = ?", [$title, $description, $id]);
        $pdo = DB::connection()->getPdo()->prepare("UPDATE posts SET title = ?, description = ? WHERE id = ?");
        $pdo->execute([$title, $description, $id]);
        return $mysql;
    }
}
