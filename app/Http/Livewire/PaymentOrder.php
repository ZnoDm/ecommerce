<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class PaymentOrder extends Component
{
    use AuthorizesRequests;
    public $order;
    protected $listeners = ['payOrderPaypal'];

    public function mount(Order $order){
        $this->order = $order;
    }

    //Este método funcionará para Paypal
    public function payOrderPaypal(){        
        $this->authorize('payment',$this->order);
        $this->order->status = 2;
        $this->order->save();        
        return redirect()->route('orders.show',$this->order);
    }
    public function render()
    {
        //Policy
        $this->authorize('author',$this->order);
        $envio = json_decode($this->order->envio);
        
        $items = json_decode($this->order->content);
        return view('livewire.payment-order',compact('items','envio'));
    }
}
