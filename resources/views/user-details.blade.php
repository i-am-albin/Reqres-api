@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/">{{ __('Dashboard') }}</a>/User</div>
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
					               				                			               
					            </tr>
					        </thead>
					        <tbody>
					        	
					        	<tr>
						        	<td><?= $data->id?></td>
						        	<td><img src=<?= $data->avatar?> height="50px" width="50px"></td>
						        	<td><?= $data->first_name?> <?= $data->last_name?></td>
						        	<td><?= $data->email ?></td>
					        		
					        	</tr>
					        </tbody>
					    </table>				    
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
