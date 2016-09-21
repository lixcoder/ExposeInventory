<?php
	function asMoney($value){
		return number_format($value, 2);
	}
?>

<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta charset="utf-8">

		<style type="text/css" media="screen">
			@page { margin: 170px 20px; }
			 .header { position: fixed; left: 0px; top: -150px; right: 0px; height: 150px;  text-align: center; }
			 .content {margin-top: -120px; margin-bottom: -150px}
			 .footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 50px;  }
			 .footer .page:after { content: counter(page, upper-roman); }


			  .demo {
			    border:1px solid #C0C0C0;
			    border-collapse:collapse;
			    padding:0px;
			  }
			  .demo th {
			    border:1px solid #C0C0C0;
			    padding:5px;
			  }
			  .demo td {
			    border:1px solid #C0C0C0;
			    padding:5px;
			  }


			  .inv {
			    border:1px solid #C0C0C0;
			    border-collapse:collapse;
			    padding:0px;
			  }
			  .inv th {
			    border:1px solid #C0C0C0;
			    padding:5px;
			  }
			  .inv td {
			    border-bottom:0px solid #C0C0C0;
			    border-right:1px solid #C0C0C0;
			    padding:5px;
			  }


		</style>

	</head>

	<body>
		<div class="content">
			<div class="row">
				<div class="col-lg-12">
					
					<table class="" style="border: 0px; width: 100%; ">
						<tr>

							<td style="width: 150px">
								<img src="{{URL::to('public/img/xpose.jpg')}}" width="30px" alt="LOGO">
							</td>

							<td>
								{{ 'Company Address' }}
							</td>

							<td>&nbsp;</td>
            	<td>&nbsp;</td>
							
							<td colspan="2">
								@foreach($order as $quote)
								<?php $date = $quote->date; $quote_number = $quote->order_number; ?>
								@endforeach
								<strong>Quotation</strong>
								<table class="demo" style="width: 100%">
									<tr>
										<td>Date</td><td>Quote #</td>
									</tr>
									<tr>
										<td>{{ $date }}</td><td>{{ $quote_number }}</td>
									</tr>
								</table>
							</td>

						</tr>
					</table>

					<br>

					<table class="demo" style="width: 40%">
						<tr>
							<td><strong>Client</strong></td>
						</tr>
						<tr>
							<td>
								{{ 'Client Data ...' }}
							</td>
						</tr>
					</table>

					<br>

					<table class="inv" style="width: 100%">
						<tr>
							<td style="border-bottom:1px solid #C0C0C0"><strong>Item</strong></td>
							<td style="border-bottom:1px solid #C0C0C0"><strong>Description</strong></td>
	            <td style="border-bottom:1px solid #C0C0C0"><strong>Qty</strong></td>
	            <td style="border-bottom:1px solid #C0C0C0"><strong>Rate</strong></td>
	            <td style="border-bottom:1px solid #C0C0C0"><strong>Amount</strong></td>
						</tr>
						
						<?php $total = 0; $i = 1; $grand = 0; $discount = 0;?>

						@foreach($order as $quote)
						
						<?php 
							$discount = $quote->discount;
							$amount = $quote->lease_price * $quote->quantity;
							$total += $amount;
							$discount = $quote->discount;
						?>
						
						<tr>
							<td>{{ $quote->name }}</td>	
							<td>{{ $quote->description }}</td>	
							<td>{{ $quote->quantity }}</td>	
							<td>{{ asMoney($quote->lease_price) }}</td>	
							<td>{{ asMoney($amount) }}</td>	
						</tr>

						@endforeach

						<tr>
            	<td style="border-top:1px solid #C0C0C0" rowspan="4" colspan="3">&nbsp;</td>
            	<td style="border-top:1px solid #C0C0C0" ><strong>Total Amount</strong> </td><td style="border-top:1px solid #C0C0C0" colspan="1">KES {{asMoney($total)}}</td></tr>

           	<tr>

           	<tr>
            	<td style="border-top:1px solid #C0C0C0" ><strong>Discount</strong> </td><td style="border-top:1px solid #C0C0C0" colspan="1">KES {{asMoney($discount)}}</td></tr>
           	<tr>

						<?php
							$grand = $grand + $total;
						?>

						<tr>
           		<td rowspan="4" colspan="3">&nbsp;</td>
            	<td style="border-top:1px solid #C0C0C0" ><strong>Amount Payable</strong> </td><td style="border-top:1px solid #C0C0C0" colspan="1">KES {{asMoney($grand-$discount)}}</td>
            </tr>

					</table>

				</div>
			</div>
		</div>	
	</body>

</html>