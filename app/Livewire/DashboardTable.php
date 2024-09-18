<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardTable extends Component
{
    use WithPagination;

    public $status = 'all'; // Default to showing all orders

    protected $queryString = ['status'];

    public function render()
    {
        $query = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc');

        if ($this->status !== 'all') {
            $query->where('status', $this->status);
        }

        return view('livewire.dashboard-table', [
            'orders' => $query->paginate(10),
        ]);
    }
}
