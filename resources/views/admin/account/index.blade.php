@extends('admin.master')

@section('content')

<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Page</h5></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                D1 </a>
            </li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">D2</a></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1">
                        <div class="tbl-caption">
                            <h4 class="heading mb-0">Employees</h4>
                            <div>
                                <a class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">+ Add Account</a>
                            </div>
                        </div>
                            <table id="empoloyees-tblwrapper" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Account Number</th>
                                        <th>Currency</th>
                                        <th>Balance</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($accounts as $account)
                                    <tr>
                                        <td><span>{{$account->id}}</span></td>
                                        <td>
                                            <div class="products">
                                                <img src="images/contacts/pic2.jpg" class="avatar avatar-md" alt="">
                                                <div>
                                                    <h6>{{$account->account_name}}</h6>
                                                </div>	
                                            </div>
                                        </td>
                                        <td><span>{{$account->account_number}}</span></td>
                                        <td><span class="text-primary">{{$account->currency_type}}</span></td>
                                        <td>
                                            <span>{{$account->balance}}</span>
                                        </td>	
                                        <td>
                                            <span>{{$account->created_at}}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-success light border-0">Active</span>
                                        </td>
                                    </tr>
                                    @endforeach 

                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>






















@endsection