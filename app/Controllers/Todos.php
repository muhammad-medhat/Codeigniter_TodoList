<?php namespace App\Controllers;

use App\Models\TodoModel;

class Todos extends BaseController{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->todos_model = new TodoModel();
        $this->perpage=10;
    }
    public function index(){
        return  $this->show_todos();

        // $tbl = $this->db->table('todos');

        // $todos = $this->get_todos();        
        // //$todos = $tbl->get()->getResult();

        // //$this->dump_obj($todos);

        // return view('todo_list',array( 'todos'=>$todos));
    }

    public function insert(){
        //$this->dump_obj($this->request);
        $mtd  = $this->request->getMethod();
        // echo $mtd;
        switch($mtd){
            case 'post': 
                //DB Insert
                $data=array(
                    'name'=>$this->request->getVar('name'), 
                    'description'=>$this->request->getVar('description'), 
                    'done'=> $this->request->getVar('done')  //==false )? 0: 1
                );                
                //$this->dump_obj($data);
                $this->todos_model->insert($data);
                $session = session();
                // $this->dump_obj($session);
                dump_obj($data);

                return $this->show_todos();

            default:
                $title = 'Insert a task';
                return view('todos_form', array('title'=>$title));
        }


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

    function get_todos(){
        // $todos_model = new TodoModel();
        return $this->todos_model->asObject()->paginate($this->perpage);        
    }



    function show_todos(){
        $title = 'Todos list';
        $todos=$this->get_todos();
        return view('todo_list', 
            array(
                'title'=>$title, 
                'todos'=>$todos, 
                'pager'=>$this->todos_model->pager
            )
        );
    }




    // function dump_obj($obj){
    //     echo "<pre>";
    //     var_dump($obj);
    //     echo "</pre>";
    // }
}
