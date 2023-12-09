@extends('admin.common.master')
@section('content')
   <div class="body-wrapper">
         <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
               <div class="col-lg-6 col-sm-6">
                  <h6 class="page-title">Dashboard</h6>
               </div>
               <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                  <a href="javascript:void(0)" class="btn         btn--success  "><i class="fa fa-fw fa-clock"></i>Last Cron Run : 31 seconds ago</a>
               </div>
            </div>



            <div class="row mb-none-30">
               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--primary b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-users"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">336</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Total Users</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/users" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--1 b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fas fa-wallet"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="currency-sign">$</span>
                           <span class="amount">6342.95</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Users Balance</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/users/active" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>


               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--success b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-users"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">336</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Total Verified Users</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/users/active" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--red b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-ban"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">0</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Banned Users</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/users/banned" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>


               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--indigo b-radius--10 box-shadow ">
                     <div class="icon">
                        <i class="la la-envelope"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">336</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Total Email Verified</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/users/email-verified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--danger b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-envelope"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">0</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Total Email Unverified</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/users/email-unverified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--primary b-radius--10 box-shadow ">
                     <div class="icon">
                        <i class="fa fa-phone"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">336</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Total SMS Verified</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/users/sms-verified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--pink b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-window-close"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">0</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Total SMS Unverified</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/users/sms-unverified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>


               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--cyan b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-money-bill-wave-alt"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="currency-sign">$</span>
                           <span class="amount">20900</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Total Invest</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/report/invest" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--info b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-money-bill-wave-alt"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="currency-sign">$</span>
                           <span class="amount">0</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Last 7 Days Invest</span>
                        </div>
                        <a href="#0" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>


               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--3 b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="las la-hand-holding-usd"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="currency-sign">$</span>
                           <span class="amount">65</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Total Referral Commission</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/report/referral-commission" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--17 b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="las la-tree"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="currency-sign">$</span>
                           <span class="amount">25.95</span>

                        </div>
                        <div class="desciption">
                           <span class="text--small">Total Binary Commission</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/report/binary-commission" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--deep-purple b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="las la-cut"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">0</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Users Total Bv Cut</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/report/bv-log?type=cutBV" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--15 b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="las la-cart-arrow-down"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">2350</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Users Total BV</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/report/bv-log?type=paidBV" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>


               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--10 b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="las la-arrow-alt-circle-left"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">2140</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Users Left BV</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/report/bv-log?type=leftBV" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--3 b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="las la-arrow-alt-circle-right"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">210</span>
                        </div>
                        <div class="desciption">
                           <span class="text--small">Right BV</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/report/bv-log?type=rightBV" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row mt-50 mb-none-30">
               <div class="col-xl-6 mb-30">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Monthly Deposit & Withdraw Report</h5>
                        <div id="apex-bar-chart"></div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 mb-30">
                  <div class="row mb-none-30">
                     <div class="col-lg-6 col-sm-6 mb-30">
                        <div class="widget-three box--shadow2 b-radius--5 bg--white">
                           <div class="widget-three__icon b-radius--rounded bg--success  box--shadow2">
                              <i class="las la-money-bill "></i>
                           </div>
                           <div class="widget-three__content">
                              <h2 class="numbers">27705 USD</h2>
                              <p class="text--small">Total Deposit</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6 mb-30">
                        <div class="widget-three box--shadow2 b-radius--5 bg--white">
                           <div class="widget-three__icon b-radius--rounded bg--teal box--shadow2">
                              <i class="las la-money-check"></i>
                           </div>
                           <div class="widget-three__content">
                              <h2 class="numbers">285.05 USD</h2>
                              <p class="text--small">Total Deposit Charge</p>
                           </div>
                        </div>
                     </div>

                     <div class="col-lg-6 col-sm-6 mb-30">
                        <div class="widget-three box--shadow2 b-radius--5 bg--white">
                           <div class="widget-three__icon b-radius--rounded bg--warning  box--shadow2">
                              <i class="las la-spinner"></i>
                           </div>
                           <div class="widget-three__content">
                              <h2 class="numbers">0</h2>
                              <p class="text--small">Pending Deposit</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6 mb-30">
                        <div class="widget-three box--shadow2 b-radius--5 bg--white">
                           <div class="widget-three__icon b-radius--rounded bg--danger box--shadow2">
                              <i class="las la-ban "></i>
                           </div>
                           <div class="widget-three__content">
                              <h2 class="numbers">0</h2>
                              <p class="text--small">Reject Deposit</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div><!-- row end -->


            <div class="row mt-50 mb-none-30">
               <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--15 b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-wallet"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">1</span>
                        </div>
                        <div class="desciption">
                           <span>Withdraw Method</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/withdraw/method" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>


               <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--success b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-hand-holding-usd"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">18</span>
                           <span class="currency-sign">USD</span>
                        </div>
                        <div class="desciption">
                           <span>Total Withdraw</span>
                        </div>
                        <a href="https://script.viserlab.com/bisurv/admin/withdraw/approved" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--danger b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-money-bill-alt"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">0.0018 </span>
                           <span class="currency-sign">USD</span>
                        </div>
                        <div class="desciption">
                           <span>Total Withdraw Charge</span>
                        </div>

                        <a href="https://script.viserlab.com/bisurv/admin/withdraw/approved" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                  <div class="dashboard-w1 bg--warning b-radius--10 box-shadow">
                     <div class="icon">
                        <i class="fa fa-spinner"></i>
                     </div>
                     <div class="details">
                        <div class="numbers">
                           <span class="amount">38</span>
                        </div>
                        <div class="desciption">
                           <span>Withdraw Pending</span>
                        </div>

                        <a href="https://script.viserlab.com/bisurv/admin/withdraw/pending" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                     </div>
                  </div>
               </div>
            </div>


            <div class="row mb-none-30 mt-5">

               <div class="col-xl-6 mb-30">
                  <div class="card ">
                     <div class="card-header">
                        <h6 class="card-title mb-0">New User list</h6>
                     </div>
                     <div class="card-body p-0">
                        <div class="table-responsive--sm table-responsive">
                           <table class="table table--light style--two">
                              <thead>
                                 <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td data-label="User">
                                       <div class="user">
                                          <div class="thumb"><img src="https://script.viserlab.com/bisurv/assets/images/avatar.png" alt="image"></div>
                                          <span class="name">Amutuhaire Mujaidu</span>
                                       </div>
                                    </td>
                                    <td data-label="Username"><a href="https://script.viserlab.com/bisurv/admin/user/detail/336">Jean256</a>
                                    </td>
                                    <td data-label="Email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5839352d2c2d3039312a3d3f2d35396968183f35393134763b3735">[email&#160;protected]</a></td>
                                    <td data-label="Action">
                                       <a href="https://script.viserlab.com/bisurv/admin/user/detail/336" class="icon-btn" data-toggle="tooltip" title="Details">
                                          <i class="las la-desktop text--shadow"></i>
                                       </a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td data-label="User">
                                       <div class="user">
                                          <div class="thumb"><img src="https://script.viserlab.com/bisurv/assets/images/avatar.png" alt="image"></div>
                                          <span class="name">testtesttest testsetst</span>
                                       </div>
                                    </td>
                                    <td data-label="Username"><a href="https://script.viserlab.com/bisurv/admin/user/detail/335">testtesttest</a>
                                    </td>
                                    <td data-label="Email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="691d0c0c1a1d1d0c1a1d1d1a0c1d290e04080005470a0604">[email&#160;protected]</a></td>
                                    <td data-label="Action">
                                       <a href="https://script.viserlab.com/bisurv/admin/user/detail/335" class="icon-btn" data-toggle="tooltip" title="Details">
                                          <i class="las la-desktop text--shadow"></i>
                                       </a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td data-label="User">
                                       <div class="user">
                                          <div class="thumb"><img src="https://script.viserlab.com/bisurv/assets/images/avatar.png" alt="image"></div>
                                          <span class="name">ewrwer gertert</span>
                                       </div>
                                    </td>
                                    <td data-label="Username"><a href="https://script.viserlab.com/bisurv/admin/user/detail/334">hrtytertert</a>
                                    </td>
                                    <td data-label="Email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c7afb5b3beb3a2b5b3a2b5b387a0aaa6aeabe9a4a8aa">[email&#160;protected]</a></td>
                                    <td data-label="Action">
                                       <a href="https://script.viserlab.com/bisurv/admin/user/detail/334" class="icon-btn" data-toggle="tooltip" title="Details">
                                          <i class="las la-desktop text--shadow"></i>
                                       </a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td data-label="User">
                                       <div class="user">
                                          <div class="thumb"><img src="https://script.viserlab.com/bisurv/assets/images/avatar.png" alt="image"></div>
                                          <span class="name">akshay karme</span>
                                       </div>
                                    </td>
                                    <td data-label="Username"><a href="https://script.viserlab.com/bisurv/admin/user/detail/333">Akshay</a>
                                    </td>
                                    <td data-label="Email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b1d0dac2d9d0c8da808582c9f1d6dcd0d8dd9fd2dedc">[email&#160;protected]</a></td>
                                    <td data-label="Action">
                                       <a href="https://script.viserlab.com/bisurv/admin/user/detail/333" class="icon-btn" data-toggle="tooltip" title="Details">
                                          <i class="las la-desktop text--shadow"></i>
                                       </a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td data-label="User">
                                       <div class="user">
                                          <div class="thumb"><img src="https://script.viserlab.com/bisurv/assets/images/avatar.png" alt="image"></div>
                                          <span class="name">TEst TEst</span>
                                       </div>
                                    </td>
                                    <td data-label="Username"><a href="https://script.viserlab.com/bisurv/admin/user/detail/332">testtest222</a>
                                    </td>
                                    <td data-label="Email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cdb9a8beb9b9a8beb98db9a8beb9e3aea2a0">[email&#160;protected]</a></td>
                                    <td data-label="Action">
                                       <a href="https://script.viserlab.com/bisurv/admin/user/detail/332" class="icon-btn" data-toggle="tooltip" title="Details">
                                          <i class="las la-desktop text--shadow"></i>
                                       </a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td data-label="User">
                                       <div class="user">
                                          <div class="thumb"><img src="https://script.viserlab.com/bisurv/assets/images/avatar.png" alt="image"></div>
                                          <span class="name">to mr</span>
                                       </div>
                                    </td>
                                    <td data-label="Username"><a href="https://script.viserlab.com/bisurv/admin/user/detail/331">tometou</a>
                                    </td>
                                    <td data-label="Email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="61150e0c04150e14210f001704134f020e0c">[email&#160;protected]</a></td>
                                    <td data-label="Action">
                                       <a href="https://script.viserlab.com/bisurv/admin/user/detail/331" class="icon-btn" data-toggle="tooltip" title="Details">
                                          <i class="las la-desktop text--shadow"></i>
                                       </a>
                                    </td>
                                 </tr>

                              </tbody>
                           </table><!-- table end -->
                        </div>
                     </div>
                  </div><!-- card end -->
               </div>

               <div class="col-xl-6 mb-30">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last 30 days Withdraw History</h5>
                        <div id="withdraw-line"></div>
                     </div>
                  </div>
               </div>


            </div>

            <div class="row mb-none-30 mt-5">
               <div class="col-xl-4 col-lg-6 mb-30">
                  <div class="card overflow-hidden">
                     <div class="card-body">
                        <h5 class="card-title">Login By Browser</h5>
                        <canvas id="userBrowserChart"></canvas>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6 mb-30">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Login By OS</h5>
                        <canvas id="userOsChart"></canvas>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6 mb-30">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Login By Country</h5>
                        <canvas id="userCountryChart"></canvas>
                     </div>
                  </div>
               </div>
            </div>

            <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cron Job Setting Instruction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-12 my-2">
                              <p class="cron-p-style"> To automate BV Matching Bonus, choose your required setting from above and run the <code> cron job </code> on your server. Set the Cron time as minimum as possible. Once per <code>5-15</code> minutes is ideal.</p>
                           </div>
                           <div class="col-md-12">
                              <label>Cron Command</label>
                              <div class="input-group ">
                                 <input id="ref" type="text" class="form-control form-control-lg" value="curl -s https://script.viserlab.com/bisurv/cron" readonly="">
                                 <div class="input-group-append" id="copybtn">
                                    <span class="input-group-text btn--success" title="" onclick="myFunction()"> COPY</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>





         </div><!-- bodywrapper__inner end -->
      </div><!-- body-wrapper end -->
      @endsection