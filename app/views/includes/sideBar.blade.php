<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <!-- dashboard -->

                  <li>

                      <a href="{{ URL::route('dashboard') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  @if(Entrust::hasRole(Config::get('customConfig.roles.Admin')))
                  {{-- Task Manager --}}
                  <li>

                      <a href="{{URL::route('students.index')}}">
                          <i class="fa fa-users"></i>
                          <span>Students</span>
                      </a>
                  </li>

                  @endif


                  









              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>