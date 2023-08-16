<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCartDetail;
use App\Http\Requests\StoreShoppingCartDetailRequest;
use App\Http\Requests\UpdateShoppingCartDetailRequest;
use App\Models\ShoppingCart;

class ShoppingCartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShoppingCartDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoppingCartDetailRequest $request)
    {
        //
        $shopping_cart=ShoppingCart::get_the_session_shopping_cart();dd($shopping_cart->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingCartDetailRequest  $request
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoppingCartDetailRequest $request, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }
}
