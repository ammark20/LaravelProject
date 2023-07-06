@extends('master')
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Admin Dashboard</h1>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#users">Users</a></li>
                    <li><a data-toggle="tab" href="#products">Products</a></li>
                    <li><a data-toggle="tab" href="#orders">Orders</a></li>
                </ul>

                <div class="tab-content">
                    <div id="users" class="tab-pane fade in active">
                        <h3>Users</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>is_admin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $usr)
                                    <tr>
                                        <td>{{ $usr->id }}</td>
                                        <td>{{ $usr->name }}</td>
                                        <td>{{ $usr->email }}</td>
                                        <td>{{ $usr->is_admin }}</td>
                                        <td>
                                            @if ($usr->is_admin != 'admin')
                                                <a href="{{ route('admin.users.makeAdmin', ['id' => $usr->id]) }}">Make Admin</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="products" class="tab-pane fade">
                        <h3>Products</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.delete', ['id' => $product->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="orders" class="tab-pane fade">
                        <h3>Orders</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name ?? 'Unknown' }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>
                                        <form action="{{ route('admin.orders.update-status', ['id' => $order->id]) }}" method="POST">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="#">View</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
