<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TodoModel;


class RestTodos extends ResourceController
{
	public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->todos_model = new TodoModel();

        // $this->supportedResponseFormats = [
		// 	'application/json',
		// 	'application/xml'
		// ];
    }
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		$ret = $this->todos_model->findAll();    
		$n = count($ret)    ;
		$response = [
            'status' => 200,
            'error' => null,
            'messages' => "Todos $n Found",
            "data" => $ret,
        ];
        return $this->respond($response); 

	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		if(isset($id)){
			$task = $this->todos_model->find($id);
			return $this->respond($task);
		} else {
			return $this->index();
		}
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		$data=array(
			'name'=>$this->request->getVar('name'), 
			'description'=>$this->request->getVar('description'), 
			'done'=> $this->request->getVar('done')  
		);  
		$this->todos_model->insert($data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => "todo Saved",
			'data'=> $data
        ];
      
        return $this->respondCreated($response);
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//
	}
}
