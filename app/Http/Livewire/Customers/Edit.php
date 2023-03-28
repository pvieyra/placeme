<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer;
use App\Models\CustomerHistory;
use Livewire\Component;

class Edit extends Component
{

    public $customerID;
    public $customer;
    public $name;
    public $last_name;
    public $email;
    public $phone;

    public function render()
    {
        return view('livewire.customers.edit');
    }

    public function mount($customer){
        $this->customerID = $customer->id;
        $this->customer = $customer;
        $this->name = $customer->name;
        $this->last_name = $customer->last_name;
        $this->second_last_name = $customer->second_last_name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;

    }

    protected $messages = [
        'name.required' => "Debes colocar al menos un nombre.",
        'last_name.required' => "El apellido paterno es obligatorio",
        'email.email' => "Debes colocar un correo valido",
        'phone.required' => "Debes colocar un telefono"
    ];

    protected function rules()
    {
        return [
            'name' => ['required'],
            'last_name' => [ 'required'],
            'email' => ['email'],
            'phone' => [ 'required'],
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function update() {
        $this->validate();
        $this->customer->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'second_last_name' => $this->second_last_name,
            'email' => $this->email,
        ]);
        CustomerHistory::create([
            'customer_id'=> $this->customerID,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'second_last_name' => $this->second_last_name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        session()->flash('message', __('Cliente actualizado.'));
    }
}
