<?php

require_once 'app/Controllers/Controller.php';
require_once 'app/Response.php';
require_once 'app/Models/Article.php';

class VVTagsController extends Controller
{
    public function create(){

        $content = $this->render("/tags/v2create.php");
        return Response::html($content);


        // $header = "Content-Type: text/html; charset=utf-8"; //HTMLの形で返す
        // http_response_code(200);//ブラウザ側に結果を正しく返す
        // header("Content-Type: text/html; charset=utf-8");//header(どういう情報内容か,今回はHTMLの形)
        // echo $content;

    }

    public function store(){
        // $input = $_POST; //$_POSTは配列で返す仕様、HTTPのPOSTメソッドで送信されたフォームなどのデータを受け取る
        // // echo $input; //echoは文字列しか返せない
        // var_dump($input["tag"]);

        $tag = $_POST['tag'];

        // $db = new PDO('mysql:dbname=team_dev;localhost=db;charset=utf8mb4','team_user','pass');
        $db = new PDO('mysql:host=db;dbname=team_dev', 'team_user', 'pass');

        $sql = "INSERT INTO tags(name) VALUES(':tags')";
        $statment = $db->prepare($sql);
        // $statment = $db->query($sql);
        $statment->execute([":tags" => $_POST['tag']]);
    }


}
