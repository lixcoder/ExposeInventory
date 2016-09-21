@include('includes.header')
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Create New Quotation
					</h3>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>			
			<!-- END PAGE HEADER-->
			<div>				
				<?php $message = Session::get('message');?>
					@if(isset($message))
					<div class="alert alert-info alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  <strong>{{$message}}</strong>	
					</div>						
					@endif	

				<?php $alert = Session::get('alert');?>
					@if(isset($alert))
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  <strong>{{$alert}}</s
					  trong>	
					</div>						
					@endif						
			</div>		
			<!--START CONTENT-->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				 	<h3>New Quote</h3>
				 	<hr>
				 	<!-- BEGIN PAGE CONTENT-->
					
					<div class="col-md-12">
						<form role="form" class="form-inline" action="{{{ URL::to('orders/quotation/create/'.$id) }}}" method="POST">
							&emsp;&emsp;<div class="form-group">
								<label>Items</label>&nbsp;
								<select name="item" class="form-control">
									<option value="">---Select Items---</option>
									@foreach($assets as $asset)
										<option value="{{ $asset->id }}">{{ $asset->name }} - {{ $asset->serial_number }}</option>
									@endforeach
								</select>
							</div>&emsp;
							<div class="form-group">
								<label>Quantity</label>&nbsp;
								<input class="form-control" type="text" name="quantity" placeholder="Item Quantity">
							</div>&emsp;
							<div class="form-group">
								<button type="submit" class="btn btn-success" style="border-radius:100%;"><span class="fa fa-plus"></span></button>
							</div>
						</form>
					</div>
					<br><br><hr>
					
					<?php $payable=0; $discount=0; ?>
					<div class="col-md-12">
						<div class="panel panel-default">
							
							<form role="form" action="{{{ URL::to('orders/quotation/store') }}}" method="POST">
							<input type="hidden" name="event_id" value="{{$id}}">
							<div class="panel-heading">
								<h5>Items in Session</h5>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-bordered table-stripped">
										<thead>
											<th>#</th>
											<th>Item</th>
											<th>Serial #</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Total</th>
											<th>ACTIONS</th>
										</thead>
										<tbody>
											<?php $count=1; ?>
											@if(isset($quoteItems))
											@foreach($quoteItems as $quoteitem)
												<?php 
													$total = $quoteitem['item_price'] * $quoteitem['item_quantity'];
													$payable += $total;
												?>
												<tr>
													<td>{{ $count }}</td>
													<td>{{ $quoteitem['item_name'] }}</td>
													<td>{{ $quoteitem['item_serial'] }}</td>
													<td>{{ $quoteitem['item_quantity'] }}</td>
													<td>{{ $quoteitem['item_price'] }}</td>
													<td>{{ $total }}</td>
													<td>
														
													</td>
												</tr>
											<?php $count++; ?>
											@endforeach
											@endif
										</tbody>
									</table>
									<hr>

									<script type="text/javascript">
										
									</script>

									<table border="0" align="right" style="width:400px">
											<tr style="height:50px">
												<td>Discount</td>
												<td><input class="form-control" type="text" name="discount" value="{{$discount}}" id="discount"></td>
											</tr>
											<tr style="height:50px">
												<td>Payable Amount</td>
												<td><input class="form-control" type="text" name="payable_amount" value="{{$payable}}" readonly="readonly"></td>
											</tr>
											<tr style="height:50px">
												<td>Grand Total</td>
												<td><input class="form-control" type="text" name="grand_total" value="{{$payable + $discount}}" readonly="readonly"></td>
											</tr>
									</table>
								</div>
							</div>

							<div class="panel-footer">
								<a href="" class="btn btn-danger btn-sm">Cancel</a>
								<div class="form-group pull-right">
									<input class="btn btn-primary" type="submit" name="commitBtn" value="Commit">
								</div>
							</div>
							
							</form>

						</div>
					</div>
				</div>
			 </div>
			<!--END CONTENT-->

@include('includes.footer')
