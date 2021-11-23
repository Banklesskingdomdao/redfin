
@extends('admin::admin-dashboard.layouts.app')

@section('content')

<div class="container-xl p-5">
    <div class="card card-raised">
        <div class="card-header bg-transparent px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title mb-0">Kyc Forms List</h2>
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
                    <th>Phone Number</th>  
                    <th>Date of birth</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($kyc as $key => $kycList)
                    
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $kycList->name}}</td>
                    <td>{{ $kycList->phone_number}}</td>
                    <td>{{ $kycList->date_of_birth}}</td>
                    <td>{{ $kycList->country}}</td>
                    <td><a href="/admin/kyc-list/{{$kycList->id}}" style="text-decoration: none;"><button type="button" class="btn btn-success" value="view">View</button></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <button class="btn btn-text-primary mdc-ripple-upgraded" id="msg-div" role="button" onclick="window.toasts[&quot;topRightDemo&quot;].show()" style="display:none;">Top Right</button>
            <div class="z-index-toast position-fixed top-0 end-0 p-3">
                <div class="toast align-items-center text-white bg-primary fade hide" role="alert" aria-live="assertive" aria-atomic="true" data-toast-name="topRightDemo">
                <div class="d-flex">
                <div class="toast-body" id="error-msg"></div>
            <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
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