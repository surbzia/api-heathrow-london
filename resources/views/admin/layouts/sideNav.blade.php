 <div class="left-side-bar">
     <div class="brand-logo" style="width: 100%;background-color: white; border-right: 1px solid #e5e4e4;">
         <a href="index.html">
             {{-- <img src="{{ asset('templete/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
             <img src="{{ asset('templete/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo"> --}}
             <img src="{{ asset('image/logo.png') }}" alt="" class="light-logo" style="width: 128px;margin-left: 16px;">
         </a>
         <div class="close-sidebar" data-toggle="left-sidebar-close">
             <i class="ion-close-round"></i>
         </div>
     </div>
     <div class="menu-block customscroll">
         <div class="sidebar-menu">
             <ul id="accordion-menu">

                <li>
                     <a href="{{route('dashboard')}}"   class="dropdown-toggle no-arrow {{activeNav('dashboard')}}">
                         <span class="micon dw dw-analytics-3"></span><span class="mtext">Dashboard</span>
                     </a>
                 </li>

                 <li>
                     <a href="{{route('booking.index')}}" class="dropdown-toggle no-arrow bg-success">
                         <span class="micon dw dw-calendar-11"></span>
                         <span class="mtext">BOOKING</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{route('category.index')}}" class="dropdown-toggle no-arrow {{activeNav('category.index')}}">
                         <span class="micon dw dw-folder"></span>
                         <span class="mtext">Categories</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{route('location.index')}}" class="dropdown-toggle no-arrow {{activeNav('location.index')}}">
                         <span class="micon dw dw-map"></span><span class="mtext">Locations</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{route('vehicle.index')}}" class="dropdown-toggle no-arrow {{activeNav('vehicle.index')}}">
                         <span class="micon dw dw-car"></span><span class="mtext">Vehicles</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{route('driver.index')}}" class="dropdown-toggle no-arrow {{activeNav('driver.index')}}">
                         <span class="micon dw dw-user-3"></span><span class="mtext">Drivers</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{route('customer.index')}}" class="dropdown-toggle no-arrow {{activeNav('customer.index')}}">
                         <span class="micon dw dw-user-11"></span><span class="mtext">Customers</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{route('payment.index')}}" class="dropdown-toggle no-arrow {{activeNav('payment.index')}}">
                         <span class="micon dw dw-user-11"></span><span class="mtext">Payment Type</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{route('newsletter.index')}}" class="dropdown-toggle no-arrow {{activeNav('newsletter.index')}}">
                         <span class="micon dw dw-user-11"></span><span class="mtext">NewsLetters</span>
                     </a>
                 </li>























                  <li class="dropdown">
                     <a href="javascript:;" class="dropdown-toggle">
                         <span class="micon dw dw-user-2"></span>
                         <span class="mtext">User Management</span>
                     </a>
                     <ul class="submenu">
                         <li><a href="{{route('permission.index')}}" class="{{activeNav('permission.index')}}">Permission</a></li>
                         <li><a href="{{route('role.index')}}" class="{{activeNav('role.index')}}">Role</a></li>
                         <li><a href="{{route('user.index')}}" class="{{activeNav('user.index')}}">User</a></li>
                     </ul>
                 </li>
             </ul>
         </div>
     </div>
 </div>
