	                    <br>
			                    <hr>
			                    <br>
		<div class="card">
		<div class="card-body">
			<!--<div class="float-right">
				<input id="month" class="form-control" value="" type="month">
			</div>-->
			<h2 class="card-title">Stored Record</h2>
			
			<div class="table-responsive m-t-40">
				
				<table id="myTable" class="table table-bordered table-striped" width="100%" cellspacing="0">
					<thead>
					
					<tr>
						<th>Employee Status</th>
						<th>Effective Date</th>
						<th>Reason</th>
						<th>Remarks</th>
						<th colspan="2" style="text-align: center;"> Actions </th> 
 					</tr>
					</thead>
					<tbody>
						@foreach($exitIds as $exitId)
							<tr>
								<td>{{$exitId->employee_status->name}}</td>
								<td>{{$exitId->effective_date}}</td>
								<td>{{$exitId->reason}}</td>
								<td>{{$exitId->remakrs}}</td>
								
								<td>
								 <a class="btn btn-info btn-sm" href="{{route('exit.edit',['id'=>$exitId->id])}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fas fa-pencil-alt text-white "></i></a>
								 </td>
								 <td>
								 <form action="{{route('exit.destroy',['id'=>$exitId->id])}}" method="POST">
								 @method('DELETE')
								 @csrf
								 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure to Delete')" href= data-toggle="tooltip" data-original-title="Delete"> <i class="fas fa-trash-alt"></i></button>
								 </form>
								 </td>
								  
 

															
							</tr>
						@endforeach
					
					 
					
					</tbody>
				</table>
			</div>
		</div>
	</div>