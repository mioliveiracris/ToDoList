<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\TodoModel;
use App\Models\CategoryModel;


class TodoController extends Controller
{

    public function index(){
        $todoModel = new TodoModel();
        $builder = $todoModel->table('todos');
        $builder->select('todos.id,title,status,category_id,categories.category');
        $builder->join('categories', 'categories.id = todos.category_id');
        $builder->orderBy('category asc, status asc');
        $data['todos'] = $builder->findAll();
       // echo '<pre>';
        //print_r($data);
        return view('todo_view',$data);
    }

    public function create(){
        $categoryModel = new categoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('add_todo',$data);
        //return view('add_todo');
    }
 
    public function store() {
        $todoModel = new todoModel();
        $request = \Config\Services::request();
        $data = [
            'title' => $request->getVar('title'),
            'status'  => 'A',
            'category_id' => $request->getVar('category_id'),
        ];
        $todoModel->insert($data);
        
        return $this->response->redirect(site_url('/todo-list'));

    }
    public function getCategories(){
        $categoryModel = new categoryModel();
        $data['categories'] = $$categoryModel->findAll();
        return view('add_todo',$data);
    }

    public function getTodo($id = null){
        $todoModel = new todoModel();
        $data['todo_obj'] = $todoModel->where('id', $id)->first();
        return view('edit_todo', $data);
    }

    public function update(){
        $todoModel = new todoModel();
        $request = \Config\Services::request();

        $id = $request->getVar('id');
        $data = [
            'title' => $request->getVar('title'),
            'description'  => $request->getVar('description'),
        ];
        $todoModel->update($id, $data);
        return $this->response->redirect(site_url('/todo-list'));
    }
 
    public function delete($id = null){
        $todoModel = new todoModel();
        $data['todo'] = $todoModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/todo-list'));
    }  

    public function status($id = null){
        $todoModel = new todoModel();
        $data['todo'] = $todoModel->where('id', $id)->first();
        $status = $data['todo']['status'];
        if ($status =='A' ){
            $data = ['status' => 'C',];
        }else{
            $data = ['status' => 'A',];
        }
        $todoModel->update($id, $data);
        return $this->response->redirect(site_url('/todo-list'));
        
    }  
    
}