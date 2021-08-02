<?php namespace App\Controllers;


class Todo extends BaseController{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index(){
        return view('todo_list');
    }

    public function simple($p1=null){
        return "simple function " .$p1;
    }
    public function queryparams(){
        echo "<h2>Query params</h2>";
        $params = $this->request->getVar();
        
        var_dump($params);
    }
    public function insert_task(){
        $q = "INSERT INTO `todos` (`id`, `name`, `description`) VALUES (NULL, 'Web Development', 'Html, Css, Js')";
        if($this->db->query($q)){
            echo "<h2>Successfuly Executed";
        } else{
            echo "Error";
        }
    }

    public function get_data(){
        // $q = "select * from todos";
        $q = "select * from todos where id=2";
        // $res = $this->db->query($q)->getResult());
        $res = $this->db->query($q)->getRow();
        echo "<pre>";
        var_dump($res);
        echo "</pre>";
    }
}
