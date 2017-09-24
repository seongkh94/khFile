<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class board extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('board_model');
    }
    function index(){
        if(isset($_POST['subject'])){
            if(isset($_POST['contents'])) {
                $this->board_model->insert($_POST['subject'], $_POST['contents']);
            }
        }
        $this->load->view('board_header');
        $result = $this->board_model->gets();

        $this->load->view('board_main_list', array('result'=>$result));
        $this->load->view('board_footer', array('result'=>$result));
    }

    function comment(){
        $this->board_model->comment_insert($_POST['comment']);
    }

    function logout(){
        session_destroy();
        echo("<script>location.replace('http://localhost/index.php/board');</script>");
    }
    function login(){
        $result = $this->board_model->login($_POST['modal_id'], $_POST['modal_pw']);
        if($result){
            @session_start();
            $_SESSION['id'] = $_POST['modal_id']  ;
        }else{
            echo "<script>alert('틀렸습니다')</script>";
        }
        echo("<script>location.replace('http://localhost/index.php/board');</script>");
    }


    function search(){
        $result = $this->board_model->search($_POST['select'], $_POST['search']);
        $this->load->view('board_header');
        $this->load->view('board_searchView', array('result' => $result));
        $this->load->view('board_footer', array('result'=>$result));

    }

    //페이지네이션을 통해 다음 페이지를 띄웁니다.
    function next_page($count){
        $this->load->view('board_header');
        $result = $this->board_model->gets();
        $this->load->view('board_main_list', array('result'=>$result, 'count'=> $count));
        $this->load->view('board_footer', array('result'=>$result));

    }
    // 글 쓰는 뷰를 뛰우기 위한 함수
    function write(){
        $this->load->view('board_write');
    }
    // 글 하나의 뷰를 보여주기 위한 함수
    function show($no){
        $hits_result = $this->board_model->hits_select($no);
        $this->board_model->hits_update($no, $hits_result);
        $result = $this->board_model->select($no);
        $comment_result = $this->board_model->comment_select($no);
        $this->load->view('board_print', array('result'=>$result, 'comment_result'=>$comment_result));
    }

    function delete($no){
        $this->board_model->delete($no);
        echo("<script>location.replace('http://localhost/index.php/board');</script>");
    }

    function update($no){
       $result = $this->board_model->select($no);
       $this->load->view('board_update', array('result'=>$result));;

    }

    function update_save($no){
        $this->board_model->update($no, $_POST['subject'], $_POST['contents']);
        echo("<script>location.replace('http://localhost/index.php/board');</script>");
    }


}
?>