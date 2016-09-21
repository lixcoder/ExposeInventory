<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="portlet gray box">
			<div class="portlet-title">
				<div class="caption">
					<!--<i class="fa fa-c"></i>
					<small>Quotations</small>-->
					<a href="{{{ URL::to('orders/quotation/create/'.$events['id']) }}}" class="btn btn-sm btn-primary">New Quote</a>
				</div>														
			</div>													
			<div class="portlet-body">
			<div class="table-responsive">
		        <?php $count=1;?>
		        @if(isset($assets) && count($assets)>0)
				  <table id="viewdata" class="table table-striped table-bordered">
	      			<thead>
				        <th>#</th>					      
				        <th>Order Number</th>					        
				        <th>Event ID</th>
				        <th>Date</th>	
				        <th>Status</th>
				        <th>Action</th>	    
			      </thead>
    					<tbody>
    					@foreach($quotations as $quote)
      					<tr>
      					<td>{{ $count }}</td>	      				
      					<td>{{ $quote->order_number }}</td>	      					
      					<td>{{ $quote->event_id }}</td>
      					<td>{{ $quote->date }}</td>
      					<td>{{ $quote->status }}</td>
      					<td>
      						<a href="{{ URL::to('orders/quotation/view/'.$quote->id) }}" class="btn btn-info btn-sm">View Quote</a>&emsp;
      						<a href="{{ URL::to('orders/quotation/invoice/'.$quote->id) }}" class="btn btn-info btn-sm">Invoice</a>&emsp;
      						<a role="button" id="mailBtn" data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm">Mail</a>&emsp;
      						<!-- <a href="" class="btn btn-danger btn-sm">Cancel</a> -->
      					</td>
      					<?php $count++;?>

								<!-- MODAL WINDOW TO SEND MAIL -->
								<div id="myModal" class="modal fade">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								                <h4 class="modal-title">Mail Quotation To Client</h4>
								            </div>
								            <div class="modal-body">
								                <form role="form" action="{{ URL::to('orders/quotation/mail/'.$quote->id) }}" method="POST">
								                    <div class="form-group">
								                        <label>To:</label>
								                        <input class="form-control" type="email" name="mail_to" value="">
								                    </div>
								                    <div class="form-group">
								                        <label>Subject:</label>
								                        <input class="form-control" type="text" name="subject" value="Quotation">
								                    </div>
								                    <div class="form-group">
								                        <label>Email:</label>
								                        <textarea class="form-control" name="mail_body" id="mail_body" rows="4"></textarea>
								                    </div>
								                    <hr>
								                    <div class="form-group text-right">
								                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> &emsp; 
								                        <button type="submit" class="btn btn-primary">Send Mail</button>        
								                    </div>
								                
								                </form>
								            </div>
								        </div>
								    </div>
								</div>
								<!-- END MODAL MAIL -->
								<!-- ========================================================================= -->


      				@endforeach
    					</tbody>
    				</table>   				
    				@endif      				
    				</div>	
			
			<script type="text/javascript">
				$(document).ready(function(){

				});
			</script>

			

			</div>
		</div>
	</div>			
</div>	