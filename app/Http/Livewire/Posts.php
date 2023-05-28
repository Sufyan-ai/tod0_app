<?php

namespace App\Http\Livewire;
use App\Models\Post;

use App\Models\Category;

use Livewire\Component;

class Posts extends Component
{

    public $tasks, $category, $thumbnail,$taskId, $description, $status, $category_id, $updateTask = false ;

    
    
    protected $rules = [
        'thumbnail' => 'required',
        'description' => 'required',
    ];


    public function resetFields(){
        $this->thumbnail = '';
        $this->description = '';
        $this->category_id = '';
    }
    
    
    public function render()
    {
        $this->tasks = Post::select('id', 'thumbnail', 'description', 'status')->get();
        $this->category = Category::get();
        return view('livewire.posts');
    }

    public function addPost(){
        return view('livewire.create');
    }

    public function storeTask(){


        $this->validate();
        try {
            Post::create([
                'thumbnail' => $this->thumbnail,
                'description' => $this->description,
                'category_id' => $this->category_id
            ]);
            session()->flash('success','Post Created Successfully!!');
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function editTask($tasks){
       
        $task = Post::find($this->taskId);
        $this->taskId = $tasks['id']; 
        $this->thumbnail = $tasks['thumbnail'];
        $this->description = $tasks['description'];
        $this->status = $tasks['status'] == 1 ? 0 : 1;
        $this->category_id = 4;

        $this->update();
    }

    public function update(){
        $task = Post::find($this->taskId);

        $task->category_id = $this->category_id;
        $task->thumbnail = $this->thumbnail;
        $task->description = $this->description;
        $task->status = $this->status;
        $task->save();
    }


}
