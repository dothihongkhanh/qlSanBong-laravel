<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $field;
    protected $order;
    protected $user;

    public function __construct(Field $field, Order $order, User $user)
    {
        $this->field = $field;
        $this->order = $order;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = session('username');
        $fieldCount = Field::where('username', $username)->count();

        $orderCount = Order::whereHas('details.fieldChild.field', function ($query) use ($username) {
            $query->where('id_field', '!=', $username);
        })->count();

        return view('owner.home.index', compact('fieldCount', 'orderCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
