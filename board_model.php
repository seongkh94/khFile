<?php

 class Board_model extends CI_Model{
     function __construct(){
         parent::__construct();
     }

     public function hits_select($no){
         return $this->db->query("SELECT comment FROM board where no=$no")->result_array();
     }

     public function hits_update($no, $hits_result){
         $hits =  (integer)$hits_result[0]['comment'];
         $this->db->query("UPDATE board SET comment = $hits+1 WHERE no=$no");
     }

     public function comment_select($no){
         return $this->db->query("SELECT * FROM comment WHERE no=$no")->result_array();
     }

     public function comment_insert($comment){
         $id = $_SESSION['id'];
         $no = $_SESSION['no'];
         $this->db->query("INSERT INTO comment(no, name, contents) VALUES ('$no','$id', '$comment')");
     }

     public function login($modal_id, $modal_pw){
         return $this->db->query("SELECT * FROM membership WHERE id = '$modal_id' AND password = '$modal_pw'")->result_array();
     }

     public function gets(){
         return $this->db->query("SELECT * FROM board ORDER BY no DESC")->result_array();
     }

     public function insert($subject, $contents){
         $id = $_SESSION['id'];
         $this->db->query("INSERT INTO board(name, subject, contents) VALUES ('$id','$subject', '$contents')");
     }
     public function select($no){
         return $this->db->query("SELECT * FROM board WHERE no=$no")->result_array();
     }
     public function delete($no){
         $this->db->query("DELETE FROM board WHERE no=$no");
     }
     public function update($no,$subject, $contents){
         $this->db->query("UPDATE board SET subject = '$subject', contents = '$contents' WHERE no=$no");
     }
     public function search($select, $search){
         switch ($select){
             case "전체":
                 return $this->db->query("SELECT * FROM board WHERE name LIKE '%$search%'
                                           OR subject LIKE '%$search%'
                                           OR contents LIKE '%$search%'")->result_array();
                 break;
             case "작성자":
                 return $this->db->query("SELECT * FROM board WHERE name LIKE '%$search%'")->result_array();
                 break;
             case "제목":
                 return $this->db->query("SELECT * FROM board WHERE subject LIKE '%$search%'")->result_array();
                 break;
             case "내용":
                 return $this->db->query("SELECT * FROM board WHERE contents LIKE '%$search%'")->result_array();
                 break;
         }
     }
 }
?>