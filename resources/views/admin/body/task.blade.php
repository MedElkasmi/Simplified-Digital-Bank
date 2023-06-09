<div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample">
    <div class="offcanvas-header">
       <h5 class="modal-title" id="#gridSystemModal">Add Employee</h5>
       <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
       <i class="fa-solid fa-xmark"></i>
       </button>
    </div>

    <div class="row">
      <div class="col-xl-12 col-xxl-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Account Creation</h4>
               
               @if (session('error'))
                  <div class="alert alert-danger">
                  {{ session('error') }}
                  </div>
               @endif
               @if (session('success'))
                  <div class="alert alert-succes">
                  {{ session('success') }}
                  </div>
               @endif

            </div>
            <div class="card-body">
               <div class="tab-content">
                  <form method="POST" action="{{route('account.store')}}">
                     @csrf
                     <div class="row">
                        <div class="col-lg-6 mb-2">
                           <div class="mb-3">
                              <label class="form-label">Account Type</label>
                              <select class="default-select form-control wide" name="account_type">
                                 <option value="Checking Account">Checking Account</option>
                                 <option value="Savings Account">Savings Account</option>
                                 <option value="Student Account">Student Account</option>
                                 <option value="Joint Account">Joint Account</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                           <div class="mb-3">
                              <label class="form-label">Currency :</label>
                              <select class="default-select form-control wide" name="currency_type">
                                 <option value="USD">USD</option>
                                 <option value="Euro">Euro</option>
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
                                 <option value="What is your favorite animal?">What is your favorite animal?</option>
                                 <option value="Where you were born?">Where you were born?</option>
                                 <option value="What is the name of your hight School?">What is the name of your hight School?</option>
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
