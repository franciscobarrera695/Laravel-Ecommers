<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;


class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

	
    public $brandId;
    public $status;

    #[Rule('required|min:3')]
    public $name;
 
    #[Rule('required|min:3')]
    public $slug;

    public $isOpen = 0;
 
    public function create()
    {
        $this->reset('name','slug','status','brandId');
 
        $this->openModal();
    }
    public function openModal()
    {
        $this->resetValidation();
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function store()
    {
        $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('success', 'Post created successfully.');
        
        $this->reset('name','slug');
        $this->closeModal();
    }
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $this->brandId = $id;
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;

 
        $this->openModal();
    }


    public function update()
    {
        if ($this->brandId) {
            $brand = Brand::findOrFail($this->brandId);
            $brand->update([
                'name' => $this->name,
                'slug' => $this->slug,
            ]);
            session()->flash('success', 'Post updated successfully.');
            $this->closeModal();
            $this->reset('name', 'slug', 'brandId');
        }
    }
    public function delete($id)
  {
      Brand::find($id)->delete();
      session()->flash('success', 'Post deleted successfully.');
      $this->reset('name','slug');
  }




    public function render()
    {
        return view('livewire.admin.brand.index',[
            'brands' => Brand::paginate(5)
        ])->extends('layouts.admin')->section('content');
    }
}
