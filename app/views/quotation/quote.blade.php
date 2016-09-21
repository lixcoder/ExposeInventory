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
			
		</style>

	</head>

	<body>
		<div class="content">
			<div class="row">
				<div class="col-lg-12">
					
					<table class="" style="border: 0px; width: 100%; ">
						<tr>

							<td style="width: 150px">
								<img src="" alt="LOGO">
							</td>

							<td>
								{{ 'Company Address' }}
							</td>

							<td>&nbsp;</td>
            	<td>&nbsp;</td>
							
							<td colspan="2">
								<strong>Quotation</strong>
								<table class="demo" style="width: 100%">
									<tr>
										<td>Date</td><td>Quote #</td>
									</tr>
									<tr>
										<td>{{ '' }}</td>
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
								{{ 'Clien Data ...' }}
							</td>
						</tr>
					</table>

					<br>

					<table class="inv" style="width: 100%">
						<tr>
							<td style="border-bottom:1px solid #C0C0C0">Item</td>
							<td style="border-bottom:1px solid #C0C0C0">Description</td>
	            <td style="border-bottom:1px solid #C0C0C0">Qty</td>
	            <td style="border-bottom:1px solid #C0C0C0">Rate</td>
	            <td style="border-bottom:1px solid #C0C0C0">Amount</td>
						</tr>
						
						<?php $total = 0; $i = 1; $grand = 0; ?>

						@foreach($order as $quote)
						
						<?php 
							$discount = $quote->discount;
							$amount = $quote->lease_price * $quote->quantity;
							$total += $amount;
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

						<?php
							$grand = $grand + $total;
						?>

						<tr>
            	<td style="border-top:1px solid #C0C0C0" ><strong>Amount Payable</strong> </td><td style="border-top:1px solid #C0C0C0" colspan="1">KES {{asMoney($grand-$quote->discount)}}</td>
            </tr>

					</table>

				</div>
			</div>
		</div>	
	</body>

</html>