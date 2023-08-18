<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class BrandShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $brand_id;
    public $search ='';

    // for Brand Modal Create

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'required|string'
            // 'email' => ['required', 'email', 'not_in:' . auth()->user()->email],
        ];
    }

    public function storeBrand(){
        $validateData = $this->validate();
        Brand::create($validateData);
        session()->flash('message', 'Brand Added Successfully.');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-model');
    }

    public function resetInput(){
        $this->name ='';
        $this->slug ='';
        $this->status ='';
    }

   public function render()
    {
        $brands = Brand::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.brand-show', ['brands' => $brands]);
    }

    // For Brand Modal Edit


    public function editBrand(int $brand_id){ /* Load Edit Brand Modal */
        $brand = Brand::find($brand_id);
        if($brand){
            $this->brand_id = $brand->id;
            $this->name = $brand->name;
            $this->slug = $brand->slug;
            $this->status = $brand->status;
        }else{
            return redirect()->to('/brands');
        }
    }

    public function clodeModal(){
        $this->resetInput();
    }

    public function updateBrand(){
         $validateData = $this->validate();
         Brand::where('id', $this->brand_id)->update([
            'name' => $validateData['name'],
            'slug' => $validateData['slug'],
            'status' => $validateData['status'],
         ]);
         session()->flash('message', 'Brand Updated Successfully.');
         $this->resetInput();
         $this->dispatchBrowserEvent('close-model');
    }

     // For Brand Modal Detele

     public function deleteBrand(int $brand_id){
        $this->brand_id = $brand_id;

     }

     public function destroyBrand(){
        Brand::find($this->brand_id)->delete();
        session()->flash('message', 'Brand Delete Successfully.');
         $this->dispatchBrowserEvent('close-model');
     }

}
