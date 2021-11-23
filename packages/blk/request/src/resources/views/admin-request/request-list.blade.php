
@extends('admin::admin-dashboard.layouts.app')

@section('content')

<div class="container-xl p-5">
    <div class="card card-raised">
        <div class="card-header bg-transparent px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title mb-0">Loan Request Forms List</h2>
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
                    <th>Loan Needed</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>            
                    @foreach ($requests as $request)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $request->User->name}}</td>
                    <td>{{ $request->User->email}}</td>
                    <td>{{ $request->amount_of_loan_needed}}</td>
                    <td><a href="/admin/request-list/request-view/{{$request->id}}" style="text-decoration: none;"><button type="button" class="btn btn-success" value="view">View</button></a></td>
                </tr>
                @endforeach        
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
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }
    });
</script>
@endsection