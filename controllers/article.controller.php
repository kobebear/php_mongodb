<?php
require_once("../../config/mongodb.php");
function createArticle(){
  global $db;
  session_start();
  @$uid=$_SESSION["uid"];
  @$title=$_REQUEST["title"];
  @$content=$_REQUEST["content"];
  
  $article=[
    "title"=>$title,
    "content"=>$content,
    "author"=>$uid,
    "createdDate"=>time()*1000
  ];
  $db->articles->insert($article);
}
function listArticle(){
  global $db;
  session_start();
  $list=[];
  $cursor=$db->articles->find()->sort(["createdDate"=>-1]);
  while($cursor->hasNext()) {
    $list[]=$cursor->getNext();
  }
  return $list;
}
function viewArticle(){
  global $db;
  @$_id=$_REQUEST["_id"];

}