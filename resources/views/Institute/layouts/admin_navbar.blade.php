<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
       <ul class="navbar-nav navbar-align">
          <li class="nav-item dropdown">
             <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                <div class="position-relative">
                   <i class="align-middle" data-feather="bell"></i>
                   @if(App\Helpers\NotificationHelper::getUnreadCount() > 0)
                   <span class="indicator">{{ App\Helpers\NotificationHelper::getUnreadCount() }}</span>
                   @endif
                </div>
             </a>
             <div class="py-0 dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="alertsDropdown">
                <div class="list-group">
                   @forelse (App\Helpers\NotificationHelper::getNotifications(3) as $notification)
                   <a href="{{ url($notification->data['action']) }}" class="list-group-item"
                     @if (!$notification->read_at)
                        style="background-color: rgb(229 229 229)"
                     @endif

                      >
                      <div class="row g-0 align-items-center">
                         <div class="col-2">
                            <i class="text-{{ $notification->data['color'] }}" data-feather="{{ $notification->data['icon'] }}"></i>
                         </div>
                         <div class="col-10">
                            <div class="text-dark">{{$notification->data['title']}}</div>
                            <div class="mt-1 text-muted small">{{ $notification->data['body'] }}.</div>
                            <div class="mt-1 text-muted small">{{ $notification->created_at->diffForHumans() }} &bull; {{ $notification->created_at->format('H:i A, d/m/Y') }}</div>
                         </div>
                      </div>
                   </a>
                  @empty
                  <div class="container mt-3">
                    <p>
                        There are no new notifications 😀
                    </p>
                  </div>

                  @endforelse
                   @if(App\Helpers\NotificationHelper::getUnreadCount() > 0)
                     <div class="dropdown-menu-footer">
                        <a href="#" onclick="markNotificationsAsRead();" class="text-muted">Mark all as read</a>
                     </div>
                     <script>
                        /* function markNotificationsAsRead() {
                           axios.get("{{ route('admin.markasread', auth()->user()->id) }}")
                           .then(function(response) {
                                 window.location.reload();
                           })
                           .catch(function(error) {
                                 toastr['error']('There was an error: ' + error, 'Whoopsie');
                           });
                        } */
                     </script>
                  @endif
                     {{-- <div class="dropdown-menu-footer">
                        <a href="{{ route('admin.profile.me') }}" class="text-muted">See all notifications</a>
                     </div> --}}
                </div>
             </div>
          </li>          
       </ul>
    </div>
 </nav>
