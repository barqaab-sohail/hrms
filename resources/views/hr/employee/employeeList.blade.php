@extends('layouts.master.master')
@section('title', 'BARQAAB HR')
@section('Heading')
	<h3 class="text-themecolor">List of Employees</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">List of Employees</a></li>
	</ol>
@stop
@section('content')
	<div class="card">
		<div class="card-body">
			<!--<div class="float-right">
				<input id="month" class="form-control" value="" type="month">
			</div>-->
			<h4 class="card-title">List of Employees</h4>

			
			<div class="table-responsive m-t-40">
				
				<table id="myTable" class="table table-bordered table-striped"  style="width:100%" >
					<thead>
					<tr>
						<th>Employee Name</th>
						<th>Father's Name</th>
						<th>Email</th>
						<th>CNIC</th>
						<th>CNIC Expiry</th>
						<th>Division</th>
						<th>Created at</th>
						<th> Actions </th>
						<th></th>
					</tr>
					</thead>
					<tbody>
						@foreach($employees as $employee)
							<tr>
								<td>{{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}</td>
								<td>{{$employee->father_name}}</td>
								<td>{{isset($employee->user->email)? $employee->user->email:'No Email'}}</td>
								<td>{{$employee->cnic}}</td>
								<td>{{$employee->cnic_expiry}}</td>
								<td>{{$employee->division->name}}</td>
								<td>{{$employee->created_at}}</td>
								
								<td>
									<a class="btn btn-info btn-sm" href="{{route('employee.edit',['id'=>$employee->id])}}"  title="Edit"><i class="fas fa-pencil-alt text-white "></i></a>
								</td>
								<td>
								 
 
								@role('Super Admin')
									<a class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure to Delete')" href="{{route('inactiveEmployee',['id'=>$employee->id])}}" title="Delete"> <i class="fas fa-trash-alt"></i></a>
								@endrole
								  
 

								</td>
															
							</tr>
						@endforeach
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<style>
	 th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: auto;
    }
	</style>
@push('scripts')
	<!-- start - This is for datatabe Fixed Columns only -->
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<!-- end - This is for datatabe Fixed Columns only -->
	
	<script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                stateSave: false,
        
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2,3]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2,3,4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2,3,4]
                        }
                    }, {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2,3,4]
                        }
                    },
                ],
                scrollY:        "300px",
      			scrollX:        true,
        		scrollCollapse: true,
        		paging:         false,
        		fixedColumns:   {
            		leftColumns: 1,
            		rightColumns:2
        		}
            });
            
        });
        $(document).ready(function () {
            $("#month").change(function(e){
                var url = "/" + $(this).val();
                if (url) {
                    window.location = url;
                }
                return false;
            });
        

        });

    		


	</script>
	@endpush
@stop