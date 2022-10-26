@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">book</th>
                        <th scope="col">status</th>
                        <th scope="col">actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order )
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->book->locales()->where('locale',app()->getLocale())->first()->title }}</td>
                        <td class="badge bg-secondary">{{ $order->status->value }}</td>
                        <td>

                            @if(admin())
                            @if($order->status->value == "pending")
                            <div class="row">
                                <div class="col-3">
                                    <form action="{{ route('orders.approve', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                </div>
                                <div class="col-3">
                                    <form action="{{ route('orders.reject', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                            @if($order->status->value == "reserve_request")

                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('orders.confirm', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary">Confirm Reserved</button>
                                    </form>
                                </div>
                            </div>

                            @endif

                            @else
                            @if($order->status->value == "borrowed")
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('orders.reserve', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Reserve Request</button>
                                    </form>
                                </div>

                            </div>
                            @endif
                            @endIf




                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

</main>

@endsection
