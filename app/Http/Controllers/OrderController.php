<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{

    public function __construct(\App\Models\Order $order, \App\Models\Book $book)
    {
        $this->order = $order;
        $this->book = $book;
    }


    public function index()
    {
        $orders = $this->order->where(function ($q) {
            if (user()) {
                $q->where('user_id', auth()->user()->id);
            }
        })->get();

        return view('orders.index', compact('orders'));
    }


    public function create($id)
    {
        $book = $this->book->findOrFail($id);
        $user =  auth()->user()->id;
        $order = $this->order->where(function ($q) use ($id, $user) {
            $q->where("status", "==", \App\Enums\OrderStatus::PENDING);
            $q->where('book_id', $id);
            $q->where('user_id', $user);
        })->first();

        if ($order) {
            flash('You have already ordered this book')->error();
            return back();
        }
        $order = $book->whereHas('orders', function ($q) {
            $q->where('status', \App\Enums\OrderStatus::BORROWED);
        })->first();

        if ($order) {
            flash('This book is already borrowed')->error();
            return back();
        }

        $this->order->create([
            'book_id' => $id,
            'user_id' => $user,
        ]);
        flash('Order send successfully')->success();
        return back();
    }


    public function approve($id)
    {
        $order = $this->order->findOrFail($id);
        $order->update([
            'status' => \App\Enums\OrderStatus::BORROWED,
        ]);
        flash('Order approved successfully')->success();
        return back();
    }


    public function reject($id)
    {
        $order = $this->order->findOrFail($id);
        $order->update([
            'status' => \App\Enums\OrderStatus::REJECTED,
        ]);
        flash('Order rejected successfully')->success();
        return back();
    }


    public function reserve($id)
    {
        $order = $this->order->findOrFail($id);
        $order->update([
            'status' => \App\Enums\OrderStatus::RESERVEREQUEST,
        ]);
        flash('Order reserved Request send successfully')->success();
        return back();
    }

    public function confirm($id)
    {
        $order = $this->order->findOrFail($id);
        $order->update([
            'status' => \App\Enums\OrderStatus::DONE,
        ]);
        flash('Order confirmed successfully')->success();
        return back();
    }
}
