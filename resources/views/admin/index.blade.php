@extends('admin.admin_master')

@section('admin')

<div class="page-content">
     <div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Dashboard</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">
            Cloudrevel</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

</div>
</div>
</div>
<!-- end page title -->
<div class="row">
<div class="row">
<div class="col-xl-12">
<div class="card">
    <div class="card-body">
        <div class="dropdown float-end">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
         
        </div>

        <h4 class="card-title mb-4">Loan Details</h4>


        <div class="table-responsive">
            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>Client ID</th>
                        <th>Number of Payments</th>
                        <th>First Payment Date</th>
                        <th>Last Payment Date</th>
                        <th>Loan Amount</th>
                       
                    </tr>
                </thead><!-- end thead -->
                <tbody>
               
                    @php($i = 1)

                        	@foreach($loans as $loan)
                    <tr>
                    <td>{{ $loan->clientid }}</td>
                <td>{{ $loan->num_of_payment }}</td>
                <td>{{ $loan->first_payment_date }}</td>
                <td>{{ $loan->last_payment_date }}</td>
                <td>{{ $loan->loan_amount }}</td>
                    
                       
                    </tr>
                    @endforeach
                
                </tbody><!-- end tbody -->
            </table> <!-- end table -->
        </div>
    </div><!-- end card -->
</div><!-- end card -->
</div>
<!-- end col -->
 


</div>
<!-- end row -->
</div>

</div>

@endsection