@extends('admin::admin-dashboard.layouts.app')

@section('content')

<div class="container-xl p-5">
    <div class="card card-raised">
        <div class="card-header bg-transparent px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title mb-0">Approved Loans List</h2>
                    <div class="card-subtitle"></div>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            <!-- Simple DataTables example-->
            <table id="user-table">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>                 
                </tr>
                </thead>
                <tbody>  
                    @if($approvedLoan)     
                    @foreach($approvedLoan as $key => $approved) 
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$approved->User->name}}</td>
                    <td>{{$approved->User->email}}</td>
                    <td><a href="/admin/approved/loan-details/{{$approved->id}}" style="text-decoration: none;"><button type="button" class="btn btn-success">View More</button></a></td>
                </tr>
                @endforeach
                @else
                <p>no data found<p>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" ></script>

<script>
    window.addEventListener('DOMContentLoaded', event => {
        // Simple-DataTables
        // https://github.com/fiduswriter/Simple-DataTables/wiki

        const datatablesSimple = document.getElementById('user-table');
        if (datatablesSimple){
            new simpleDatatables.DataTable(datatablesSimple);
        }
    });
</script>

@endsection