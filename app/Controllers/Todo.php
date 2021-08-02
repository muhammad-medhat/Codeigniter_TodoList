<?php namespace App\Controllers;


class Todo extends BaseController{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index(){
        $tbl = $this->db->table('todos');

        $todos = $tbl->get()->getResult();

        return view('todo_list',array( $todos));
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
    public function getData()
    {
        $tbl = $this->db->table('todos');
        $data = $tbl->get()->getResult('array');
        echo "<pre>";
        var_dump($data);
    }
}
