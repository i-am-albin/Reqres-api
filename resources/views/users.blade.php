@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
					<div class="container mt-5">
					    <h2 class="mb-4">User List</h2>
					    <table class="table table-bordered yajra-datatable">
					        <thead>
					            <tr>
					                <th>Id</th>
					                <th>Image</th>
					                <th>Name</th>
					                <th>Email</th>
					                <th>Action</th>					                			               
					            </tr>
					        </thead>
					        <tbody>
					        	@foreach($data->data as $key => $values)
					        	<tr>
						        	<td><?= $values->id?></td>
						        	<td><img src=<?= $values->avatar?> height="50px" width="50px"></td>
						        	<td><?= $values->first_name?> <?= $values->last_name?></td>
						        	<td><?= $values->email ?></td>
						        	<td><a href='/get-user/<?= $values->id ?>' style='cursor:pointer;'>View</a></td>
					        		
					        	</tr>
					        	@endforeach
					        </tbody>
					    </table>
						<div class="container">
						 
						  <ul class="pagination" style="float:right;">
						    
						  	@for($i=1;$i<=2;$i++)
						    	<li class="page-item id<?= ($i==1 )? $i.' active' : $i ?>" style="cursor: pointer;" onclick="pagination(<?= $i ?>)" ><a class="page-link"><?= $i; ?></a></li>
						  	@endfor					    						   
						  </ul>

						</div>					    
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

	function pagination(id){

			$(".page-item").removeClass('active');
			$('.id'+id).addClass('active');
			 $.ajax({
			      type: 'POST',
			      url: "/",
			      data: {id : id,"_token": "{{ csrf_token() }}"},
			      dataType: "json",
			      success: function(resultData) { 
						
							$('.yajra-datatable').find('tbody').html('');
							$.each( resultData.data, function( i, val ) {

								$('.yajra-datatable').find('tbody').append("<tr><td>"+val.id+"</td><td><img src='"+val.avatar+"' height='50px' width='50px'></td><td>"+val.first_name+''+val.last_name+"</td><td>"+val.email+"</td><td><a href='/get-user/"+val.id+"' style='cursor:pointer;'>View</a></td></tr>");
							});

			       }
			});	
	}


</script>