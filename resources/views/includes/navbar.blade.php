<!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link {{ (request()->is('home*')) ? 'active' : '' }}"
                  href="{{route('home')}}"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>


                        <li class="sidebar-item">
                    <a
                    class="sidebar-link has-arrow waves-effect waves-dark {{ (request()->is('bookingstation*')) ? 'active' : '' }} {{ (request()->is('destination*')) ? 'active' : '' }} {{ (request()->is('description*')) ? 'active' : '' }} {{ (request()->is('driverdetail*')) ? 'active' : '' }} {{ (request()->is('hamaliname*')) ? 'active' : '' }} {{ (request()->is('partydetail*')) ? 'active' : '' }} {{ (request()->is('marketingexecutive*')) ? 'active' : '' }}  "
                    href="javascript:void(0)"
                    aria-expanded="false"
                    ><i class="mdi mdi-receipt"></i
                    ><span class="hide-menu">Masters </span></a
                    >
                <ul aria-expanded="false" class="collapse first-level
                {{ (request()->is('bookingstation*')) ? 'in' : '' }}
                {{ (request()->is('destination*')) ? 'in' : '' }}
                {{ (request()->is('description*')) ? 'in' : '' }}
                {{ (request()->is('driverdetail*')) ? 'in' : '' }}
                {{ (request()->is('hamaliname*')) ? 'in' : '' }}
                {{ (request()->is('partydetail*')) ? 'in' : '' }}
                {{ (request()->is('marketingexecutive*')) ? 'in' : '' }}

                " >
                    @can('view-bookingstation','create-bookingstation','update-bookingstation','destroy-bookingstation')
                                    <li class="sidebar-item">
                            <a href="{{route('bookingstation.index')}}" class="sidebar-link {{ (request()->is('bookingstation*')) ? 'active' : '' }}"
                            ><i class="mdi mdi-note-outline"></i
                            ><span class="hide-menu"> Booking Stations </span></a
                            >
                        </li>
                     @endcan
                     @can('view-destination','create-destination','update-destination','destroy-destination')
                                    <li class="sidebar-item">
                            <a href="{{route('destination.index')}}" class="sidebar-link {{ (request()->is('destination*')) ? 'active' : '' }}"
                            ><i class="mdi mdi-note-outline"></i
                            ><span class="hide-menu"> Destinations </span></a
                            >
                        </li>
                     @endcan
                     @can('view-description','create-description','update-description','destroy-description')
                                    <li class="sidebar-item">
                            <a href="{{route('description.index')}}" class="sidebar-link {{ (request()->is('description*')) ? 'active' : '' }}"
                            ><i class="mdi mdi-note-outline"></i
                            ><span class="hide-menu"> Description </span></a
                            >
                        </li>
                     @endcan
                     @can('view-driverdetail','create-driverdetail','update-driverdetail','destroy-driverdetail')
                     <li class="sidebar-item">
             <a href="{{route('driverdetail.index')}}" class="sidebar-link {{ (request()->is('driverdetail*')) ? 'active' : '' }}"
             ><i class="mdi mdi-note-outline"></i
             ><span class="hide-menu">Driver and Vehicle Details</span></a
             >
         </li>
      @endcan
                    @can('view-hamaliname','create-hamaliname','update-hamaliname','destroy-hamaliname')
                                    <li class="sidebar-item">
                            <a href="{{route('hamaliname.index')}}" class="sidebar-link {{ (request()->is('hamaliname*')) ? 'active' : '' }}"
                            ><i class="mdi mdi-note-outline"></i
                            ><span class="hide-menu"> Hamali Names </span></a
                            >
                        </li>
                     @endcan
                     @can('view-marketingexecutive','create-marketingexecutive','update-marketingexecutive','destroy-marketingexecutive')
                                    <li class="sidebar-item">
                            <a href="{{route('marketingexecutive.index')}}" class="sidebar-link {{ (request()->is('marketingexecutive*')) ? 'active' : '' }}"
                            ><i class="mdi mdi-note-outline"></i
                            ><span class="hide-menu"> Marketing Executives </span></a
                            >
                        </li>
                     @endcan
                     @can('view-partydetail','create-partydetail','update-partydetail','destroy-partydetail')
                                    <li class="sidebar-item">
                            <a href="{{route('partydetail.index')}}" class="sidebar-link {{ (request()->is('partydetail*')) ? 'active' : '' }}"
                            ><i class="mdi mdi-note-outline"></i
                            ><span class="hide-menu"> Party Details </span></a
                            >
                        </li>
                     @endcan




                </ul>
              </li>
              @can('view-motordetail','create-motordetail','update-motordetail','destroy-motordetail')
              <li class="sidebar-item {{ (request()->is('motordetail*')) ? 'selected' : '' }}">
                <a href="{{route('motordetail.index')}}" class="sidebar-link waves-effect waves-dark {{ (request()->is('motordetail*')) ? 'active' : '' }}"
                ><i class="mdi mdi-note-outline"></i
                ><span class="sidebar-link waves-effect waves-dark "> Motor Details </span></a
                >
            </li>
            @endcan
              @can('view-lrdetail','create-lrdetail','update-lrdetail','destroy-lrdetail')
              <li class="sidebar-item {{ (request()->is('lrdetail*')) ? 'selected' : '' }}">
                <a href="{{route('lrdetail.index')}}" class="sidebar-link waves-effect waves-dark {{ (request()->is('lrdetail*')) ? 'active' : '' }}"
                ><i class="mdi mdi-note-outline"></i
                ><span class="sidebar-link waves-effect waves-dark "> LR Details </span></a
                >
            </li>
            @endcan
            @can('view-cashbill','create-cashbill','update-cashbill','destroy-cashbill')
              <li class="sidebar-item {{ (request()->is('cashbill*')) ? 'selected' : '' }}">
                <a href="{{route('cashbill.index')}}" class="sidebar-link waves-effect waves-dark {{ (request()->is('cashbill*')) ? 'active' : '' }}"
                ><i class="mdi mdi-note-outline"></i
                ><span class="sidebar-link waves-effect waves-dark "> Cashbill Details </span></a
                >
            </li>
            @endcan


            <!--  @can('update-settings')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ (request()->is('settings*')) ? 'active' : '' }}" href="{{route('settings.index')}}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="sidebar-link waves-effect waves-dark sidebar-link-text">Manage Settings</span>
                            </a>
                        </li>
                    @endcan


                    @canany(['view-category', 'create-category'])

                        <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark {{ (request()->is('category*')) ? 'active' : '' }}"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Manage Category </span></a
                >
                <ul aria-expanded="false" class="collapse first-level {{ (request()->is('category*')) ? 'in' : '' }}">


                  @can('view-category')
                                   <li class="sidebar-item">
                    <a href="{{route('category.index')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> All Categories </span></a
                    >
                  </li>
                                    @endcan
                                    @can( 'create-category')
                                   <li class="sidebar-item">
                    <a href="{{route('category.create')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Add New Category </span></a
                    >
                  </li>
                                    @endcan

                </ul>
              </li>
                    @endcan

                    @canany(['view-post', 'create-post'])

                        <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark {{ (request()->is('post*')) ? 'active' : '' }}"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Manage Posts </span></a
                >
                <ul aria-expanded="false" class="collapse first-level {{ (request()->is('post*')) ? 'in' : '' }}">


                   @can('view-post')
                                   <li class="sidebar-item">
                    <a href="{{route('post.index')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> All Posts </span></a
                    >
                  </li>
                                    @endcan
                                    @can( 'create-post')
                                   <li class="sidebar-item">
                    <a href="{{route('post.create')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Add New Post </span></a
                    >
                  </li>
                                    @endcan

                </ul>
              </li>

                    @endcan


                   @canany(['view-user', 'create-user'])

                        <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark {{ (request()->is('users*')) ? 'active' : '' }}"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Manage users </span></a
                >
                <ul aria-expanded="false" class="collapse first-level {{ (request()->is('users*')) ? 'in' : '' }}">


                   @can('view-user')
                                   <li class="sidebar-item">
                    <a href="{{route('users.index')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> All users </span></a
                    >
                  </li>
                                    @endcan
                                    @can( 'create-user')
                                   <li class="sidebar-item">
                    <a href="{{route('users.create')}}" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Add New user </span></a
                    >
                  </li>
                                    @endcan

                </ul>
              </li>
              @endcan

                    @canany(['view-permission', 'create-permission'])
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ (request()->is('permissions*')) ? 'active' : '' }}" href="{{route('permissions.index')}}">
                                <i class="fas fa-lock-open text-primary"></i>
                                <span class="sidebar-link waves-effect waves-dark sidebar-link-text">Manage Permissions</span>
                            </a>
                        </li>
                    @endcan

                    @canany(['view-role', 'create-role'])
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ (request()->is('roles*')) ? 'active' : '' }}" href="{{route('roles.index')}}">
                                <i class="fas fa-lock text-primary"></i>
                                <span class="sidebar-link waves-effect waves-dark sidebar-link-text">Manage Roles</span>
                            </a>
                        </li>
                    @endcan

                    @canany(['media'])
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ (request()->is('media*')) ? 'active' : '' }}" href="{{route('media.index')}}">
                                <i class="fas fa-images text-primary"></i>
                                <span class="sidebar-link waves-effect waves-dark sidebar-link-text">Manage Media</span>
                            </a>
                        </li>
                    @endcan
                    @canany(['view-activity-log'])
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ (request()->is('activity-log*')) ? 'active' : '' }}" href="{{route('activity-log.index')}}">
                                <i class="fas fa-history text-primary"></i>
                                <span class="sidebar-link waves-effect waves-dark sidebar-link-text">Activity Log</span>
                            </a>
                        </li>
                    @endcan
                    @canany(['view-party'])
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ (request()->is('party*')) ? 'active' : '' }}" href="{{route('party.index')}}">
                                <i class="fas fa-history text-primary"></i>
                                <span class="sidebar-link waves-effect waves-dark sidebar-link-text">Party</span>
                            </a>
                        </li>
                    @endcan -->
                    <li class="sidebar-item">
                        <hr class="my-3">
                    </li>


              <!-- <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Forms </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="form-basic.html" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> Form Basic </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="form-wizard.html" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Form Wizard </span></a
                    >
                  </li>
                </ul>
              </li> -->

            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
