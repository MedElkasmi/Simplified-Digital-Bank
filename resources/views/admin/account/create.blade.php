@extends('admin.master')

@section('content')
<div class="content-body">
   <div class="page-titles">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Wizard</a></li>
      </ol>
   </div>
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-12">
            <div class="alert alert-primary left-icon-big alert-dismissible fade show">
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
               </button>
               <div class="media">
                  <div class="alert-left-icon-big">
                     <span><i class="mdi mdi-email-alert"></i></span>
                  </div>
                  <div class="media-body">
                     <h6 class="mt-1 mb-2">Welcome to your account, Dear user!</h6>
                     <p class="mb-0">Please fill up your information in order to create your account.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row">
         <div class="col-xl-12 col-xxl-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Account Creation</h4>
               </div>
               <div class="card-body">
                  <div class="tab-content">
                     <form method="POST" action="{{route('account.store')}}">
                        @csrf
                        <div class="row">
                           <div class="col-lg-6 mb-2">
                              <div class="mb-3">
                                 <label class="text-label form-label">Account Name*</label>
                                 <input type="text" name="account_name" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-lg-6 mb-2">
                              <div class="mb-3">
                                 <label class="form-label">Account Type</label>
                                 <select class="default-select form-control wide" name="account_type">
                                    <option value="1">Type 1</option>
                                    <option value="2">Type 2</option>
                                    <option value="3">Type 3</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-6 mb-2">
                              <div class="mb-3">
                                 <label class="form-label">Currency :</label>
                                 <select class="default-select form-control wide" name="currency_type">
                                    <option value="1">Dollar</option>
                                    <option value="2">Euro</option>
                                    <option value="3">Dollar Canada</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-6 mb-2">
                              <div class="mb-3">
                                 <label class="text-label form-label">Initial Deposit</label>
                                 <input type="text" name="initial_deposit" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 mb-2">
                              <div class="mb-3">
                                 <label class="form-label">Security Question</label>
                                 <select class="default-select form-control wide" name="question">
                                    <option value="1">Question 1?</option>
                                    <option value="2">Question 2?</option>
                                    <option value="3">Question 3?</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-6 mb-2">
                              <div class="mb-3">
                                 <label class="text-label form-label">Your answer</label>
                                 <input type="text" class="form-control" name="answer" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 mb-2">
                              <div class="mb-3">
                                 <label class="text-label form-label">Tax Reference</label>
                                 <input type="text" name="tax_id" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-lg-6 mb-2">
                              <div class="mb-3">
                                 <label class="text-label form-label">Country</label>
                                 <input type="text" name="country" class="form-control"  required>
                              </div>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection