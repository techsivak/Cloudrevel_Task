@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">EMI Process Data</h4>
            
            <form method="post" action="{{ route('emi.process-data') }}" enctype="multipart/form-data">
                @csrf
               <input type="submit" class="btn btn-info waves-effect waves-light" value="Process Data">
            </form>

    <!-- dynamic EMI Proccesed data -->

    <!-- start  -->

    <br><br>

    @if($error)
                <div class="alert alert-warning mt-3">
                    {{ $error }}
                </div>
            @elseif(empty($emiDetails))
                <p>No EMI details found. Please process the data first.</p>
            @else
                <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            @foreach($columns as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emiDetails as $emi)
                            <tr>
                                @foreach($columns as $column)
                                    <td>{{ $emi->$column ?? '0.00' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

    <!-- end -->

        </div>
    </div>
</div> <!-- end col -->
</div>
 
</div>
</div>
@endsection 
