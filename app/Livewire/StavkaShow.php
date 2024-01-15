<?php

namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Stavka;
class StavkaShow extends Component
{
   
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name,$category, $quantity, $price, $added_date,$stavka;
    public $search = '';
   public $stavka_id;
    protected function rules()
    {
        return [
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'added_date' => 'required|date',
        ];
    }
    public function mount(Stavka   $stavka){
        $this->stavka=$stavka;
        $this->name=$stavka->name;
        $this->category=$stavka->category;
        $this->quantity=$stavka->quantity;
        $this->price=$stavka->price;
        $this->added_date=$stavka->added_date;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStavka()
    {
        $validatedData = $this->validate();

        Stavka::create($validatedData);
        session()->flash('message','Stavka uspješno dodata');
        $this->resetInput();
       $this->dispatch('close-modal');
    }
    
    public function editStavka(int $stavka_id)
    {
        $stavka = Stavka::find($stavka_id);
        if($stavka){

            $this->stavka_id = $stavka->id;
            $this->name = $stavka->name;
            $this->category = $stavka->category;
            $this->quantity = $stavka->quantity;
            $this->price = $stavka->price;
            $this->added_date=$stavka->added_date;
        }else{
            return redirect()->to('/stavka');
        }
    }

    public function updateStavka()
    {
        // Validate data if needed
    
        Stavka::where('id', $this->stavka_id)->update([
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'added_date' => $this->added_date,
        ]);
    
        // Flash a success message or perform other actions
    
        // Reset input fields and close the modal if needed
        $this->resetInput();
        $this->dispatch('close-modal');
    }
    



    public function deleteStavka(int $stavka_id)
    {
        $this->stavka_id = $stavka_id;

}

public function destroyStavka()
{
    Stavka::find($this->stavka_id)->delete();
   session()->flash('message','Stavka Deleted Successfully');
 $this->dispatch('close-modal');
}

public function closeModal()
{
    $this->resetInput();
}

public function resetInput()
{
    $this->name = '';
    $this->category = '';
    $this->quantity = '';
    $this->price = '';
    $this->added_date = '';
}


public function render()
{
    $stavke = Stavka::where(function ($query) {
        $query->where('name', 'like', '%'.$this->search.'%')
              ->orWhere('category', 'like', '%'.$this->search.'%');
    })->orderBy('id', 'DESC')->paginate(3);

    return view('livewire.stavka-show', ['stavke' => $stavke]);
}


}