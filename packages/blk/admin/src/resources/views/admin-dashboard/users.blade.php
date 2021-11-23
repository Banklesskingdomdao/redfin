@extends('admin::admin-dashboard.layouts.app')

@section('content')

    <div class="container-xl p-5">
        <div class="card card-raised">
            <div class="card-header bg-transparent px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-4">
                        <h2 class="card-title mb-0">Users</h2>
                        <div class="card-subtitle">Users registered into our application</div>
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
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->status == 1)
                        <div id="active">
                            <button class="badge bg-success">Active</button>
                        </div>
                        @else
                        <div id="block">
                            <button class="badge bg-danger">Blocked</button>
                        </div>
                        @endif
                    </td>
                    <td>
                        @if($user->status == 1)
                            <button type="button" onclick="blockUser('{{$user->id}}')" class="btn btn-danger">Block User</button>
                        @else
                            <button type="button" class="btn btn-success" onclick="activateuser('{{$user->id}}')">Active User</button>
                        @endif

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" ></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki

            const datatablesSimple = document.getElementById('user-table');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });

        function blockUser(userid) {
            $.ajax({
               type:'GET',
               url:'/block-user/'+userid,
               dataType: 'json',
               success:function(response) {
                   console.log(response)
                   if(response==true){
                    window.location.reload();
                   }
               }
            });
        }
        function activateuser(userid) {
            $.ajax({
               type:'GET',
               url:'/block-user/'+userid,
               dataType: 'json',
               success:function(response) {
                   console.log(response)
                   if(response==true){
                      window.location.reload();
                   }
               }
            });
        }
    </script>
    
@endsection
