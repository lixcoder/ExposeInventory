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
	public function getCreate($id)
	{
		$assets = Asset::all();
		$quoteItems = Session::get('quoteitems');
		//Session::forget('quoteitems');
		//dd($quoteItems);
		return View::make('quotation.create', compact('assets', 'quoteItems', 'id'));
	}

	/**
	 * Add Items to Session
	 */
	public function postCreate($id){
		$item_id = Input::get('item');
		$quantity = Input::get('quantity');

		if($item_id === "" || $quantity === ""){
			return Redirect::action('OrdersController@getCreate')->with('message', 'Please select an item and quantity!');
		}

		$item = Asset::findOrfail($item_id);
		//return $item_name;
		Session::push('quoteitems', [
				'item_id'=>$item->id,
				'item_name'=>$item->name,
				'item_serial'=>$item->serial_number,
				'item_price'=>$item->lease_price,
				'item_quantity'=>$quantity,
			]);
		return Redirect::action('OrdersController@getCreate', array($id));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
		$orderitems = Session::get('quoteitems');
		$input = Input::all();

		$count = DB::table('orders')->count();
		$order_number = date("Y/m/d/").str_pad($count+1, 4, "0", STR_PAD_LEFT);
		$event_id = array_get($input, 'event_id');
		//dd($input);
		$order = new Order;
		$order->event_id = $event_id;
		$order->order_number = $order_number;
		$order->type = 'quotation';
		$order->discount = array_get($input, 'discount');
		$order->date = date("Y-m-d");
		$order->save();

		foreach($orderitems as $item){
			$itm = Asset::findOrfail($item['item_id']);
			$ord = Order::findOrfail($order->id);

			$ordItem = new Orderitem;
			$ordItem->item_id = $item['item_id'];
			$ordItem->order_id = $order->id;
			$ordItem->quantity = $item['item_quantity'];
			$ordItem->save();
		}

		Session::forget('quoteitems');
		return Redirect::action('EventController@manageEvent', array($event_id));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getView($id)
	{
		$order = DB::table('orderitems')
								->join('orders', 'orderitems.order_id', '=', 'orders.id')
								->join('assets', 'orderitems.item_id', '=', 'assets.id')
								->select('orderitems.id as ordr_item_id', 'item_id', 'order_id', 'quantity', 
													'assets.id as asst_id', 'name', 'serial_number', 'description', 'lease_price',
													'orders.id as ordr_id', 'event_id', 'order_number', 'type', 'discount', 'date')
								->where('type', 'quotation')
								->where('orders.id', $id)
								->get();
		//$order = Order::findOrfail($id);
		$pdf = PDF::loadView('quotation.quote', compact('order'))->setPaper('a4')->setOrientation('landscape');
		return $pdf->stream('Quotation.pdf');
		return View::make('quotation.quote', compact('order'));
	}


	public function postMail($id){
		$mail_to = Input::get('mail_to');
		$subject = Input::get('subject');
		$mail_body = Input::get('mail_body');

		$filePath = $_SERVER['DOCUMENT_ROOT'].'/temp/';
    $fileName = 'Quotation.pdf';

    if($mail_to === "" || $subject === "" || $mail_body === ""){
    	$message = "Please fill all the fields";
    	return Redirect::back()->with('message', $message);
    }

    $order = DB::table('orderitems')
								->join('orders', 'orderitems.order_id', '=', 'orders.id')
								->join('assets', 'orderitems.item_id', '=', 'assets.id')
								->select('orderitems.id as ordr_item_id', 'item_id', 'order_id', 'quantity', 
													'assets.id as asst_id', 'name', 'serial_number', 'description', 'lease_price',
													'orders.id as ordr_id', 'event_id', 'order_number', 'type', 'discount', 'date')
								->where('type', 'quotation')
								->where('orders.id', $id)
								->get();

		$pdf = PDF::loadView('quotation.quote', compact('order'))->setPaper('a4')->setOrientation('landscape');
		//return $pdf->stream($fileName);
		$attach = $pdf->save($filePath.$fileName);

		// SEND MAIL
    $from_name = 'Xpose';
    $from_mail = 'info@lixnet.net';
    $data = array('body'=>$mail_body, 'from'=>$from_name, 'subject'=>$subject);
    Mail::send('mails.mail_quotation', $data, function($message) use($subject, $mail_to, $from_name, $from_mail, $attach, $filePath, $fileName){
        $message->to($mail_to, '');
        $message->from($from_mail, $from_name);
        $message->subject($subject);
        $message->attach($filePath.$fileName);
    });

    unlink($filePath.$fileName);

    if(count(Mail::failures()) > 0){
        $message = "Email not sent! Please try again later";
    } else{
    		$order = Order::findOrfail($id);
    		$order->status = 'mailed';
    		$order->update();
    		
        $message = "Email successfully sent";
    }
    return Redirect::back()->with('message', $message);

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
