<div>
    <div class="mb-4">
        <select wire:model="status" class="form-select">
            <option value="all">All Orders</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>S/n</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>City</th>
            <th>Name</th>
            <th>Postcode</th>
            <th>Order Date</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $key=> $order)
            <tr>
                <td>{{ $key+1  }}</td>
                <td>${{ number_format($order->total_amount, 2) }}</td>
                <td>
                    @if($order->status === 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($order->status === 'completed')
                        <span class="badge bg-success text-light">Completed</span>
                    @endif
                </td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->postcode }}</td>
                <td>{{ $order->order_date }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No orders found</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
