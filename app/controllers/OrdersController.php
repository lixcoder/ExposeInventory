<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$assets = Asset::all();
		$quoteItems = Session::get('quoteitems');
		//Session::forget('quoteitems');
		//dd($quoteItems);
		return View::make('quotation.create', compact('assets', 'quoteItems'));
	}

	/**
	 * Add Items to Session
	 */
	public function postCreate(){
		$item_id = Input::get('item');
		$quantity = Input::get('quantity');

		if($item_id === "" || $quantity === ""){
			return Redirect::action('OrdersController@getCreate')->with('message', 'Please select an item and quantity!');
		}

		$item = Asset::findOrfail($item_id);
		//return $item_name;
		Session::push('quoteitems', [
				'item_name'=>$item->name,
				'item_serial'=>$item->serial_number,
				'item_quantity'=>$quantity,
				'item_price'=>1000,
			]);
		return Redirect::action('OrdersController@getCreate');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
		dd(Session::get('quoteitems'));
		dd(Input::all());
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
