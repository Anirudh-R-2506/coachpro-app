<style>

@keyframes fourStarToThinOctagonAndBack {
	 40% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
		 transform: scale(0) rotate(0deg);
	}
	 45% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
		 transform: scale(0) rotate(45deg);
	}
	 50% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
		 transform: scale(0) rotate(67.5deg);
	}
	 55% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
		 transform: scale(1) rotate(90deg);
	}
	 60% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
		 transform: scale(1) rotate(135deg);
	}
	 65% {
		 clip-path: polygon(35% 15%, 70% 0%, 85% 35%, 100% 70%, 65% 85%, 30% 100%, 15% 65%, 0% 30%);
		 transform: scale(1) rotate(157.5deg);
	}
	 70% {
		 clip-path: polygon(30% 5%, 70% 0%, 95% 30%, 100% 70%, 70% 95%, 30% 100%, 5% 70%, 0% 30%);
		 transform: scale(1) rotate(180deg);
	}
	 75% {
		 clip-path: polygon(35% 15%, 70% 0%, 85% 35%, 100% 70%, 65% 85%, 30% 100%, 15% 65%, 0% 30%);
		 transform: scale(1) rotate(180deg);
	}
	 80% {
		 transform: scale(1) rotate(180deg);
	}
	 85% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
	}
	 90% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
		 transform: scale(0) rotate(180deg);
	}
	 95% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
		 transform: scale(0) rotate(180deg);
	}
	 100% {
		 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
		 transform: scale(0) rotate(180deg);
	}
}
 .micro {
	 display: flex;
	 width: 30px;
	 height: 30px;
	 position: relative;
}
 .micro svg {
	 width: 100% !important;
	 height: 100% !important;
	 position: absolute;
}
 .micro .spark-one-container {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 width: 40%;
	 height: 40%;
	 position: absolute;
	 right: -21%;
	 bottom: 29%;
}
 .micro .spark-one-container .spark-wrapper .spark {
	 animation: fourStarToThinOctagonAndBack 2.4s 0.3s linear infinite;
}
 .micro .spark-one-container .spark-wrapper .spark-clone {
	 animation: fourStarToThinOctagonAndBack 2.4s 0.3s linear infinite;
}
 .micro .spark-two-container {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 width: 30%;
	 height: 30%;
	 position: absolute;
	 top: 5%;
	 left: -5%;
	 background: transparent;
}
 .micro .spark-two-container .spark-wrapper .spark {
	 animation: fourStarToThinOctagonAndBack 2.4s linear infinite;
}
 .micro .spark-two-container .spark-wrapper .spark-clone {
	 animation: fourStarToThinOctagonAndBack 2.4s linear infinite;
}
 .micro .spark-three-container {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 width: 20%;
	 height: 20%;
	 position: absolute;
	 left: 9%;
	 bottom: 0%;
	 background: transparent;
}
 .micro .spark-three-container .spark-wrapper .spark {
	 animation: fourStarToThinOctagonAndBack 2.4s 0.6s linear infinite;
}
 .micro .spark-three-container .spark-wrapper .spark-clone {
	 animation: fourStarToThinOctagonAndBack 2.4s 0.6s linear infinite;
}
 .micro .spark-one-container .spark-wrapper, .micro .spark-two-container .spark-wrapper, .micro .spark-three-container .spark-wrapper {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 position: relative;
	 width: 100%;
	 height: 100%;
	 transform: rotate(-22deg);
}
 .micro .spark-one-container .spark-wrapper .spark, .micro .spark-two-container .spark-wrapper .spark, .micro .spark-three-container .spark-wrapper .spark {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 height: 80%;
	 width: 80%;
	 position: absolute;
	 background: #0084ff;
	 color: white;
	 shape-padding: 10px;
	 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
	 transform: scale(0);
}
 .micro .spark-one-container .spark-wrapper .spark-clone, .micro .spark-two-container .spark-wrapper .spark-clone, .micro .spark-three-container .spark-wrapper .spark-clone {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 height: 100%;
	 width: 100%;
	 position: absolute;
	 background: #fff;
	 color: white;
	 shape-padding: 10px;
	 clip-path: polygon(42.5% 32.5%, 70% 0%, 67.5% 42.5%, 100% 70%, 57.5% 67.5%, 30% 100%, 32.5% 58.5%, 0% 30%);
	 transform: scale(0);
}
 

</style>
   

<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
       <ul class="navbar-nav navbar-align">
          <li class="nav-item dropdown">
             <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                <div class="position-relative micro">
                   <i class="align-middle" data-feather="bell"></i>
                   @if(App\Helpers\NotificationHelper::getUnreadCount() > 0)
                   <span class="indicator">{{ App\Helpers\NotificationHelper::getUnreadCount() }}</span>                   
                   <div class="spark-one-container">
                     <div class="spark-wrapper">
                       <div class="spark-clone"></div>
                       <div class="spark"></div>
                     </div>
                   </div>
                   <div class="spark-two-container">
                     <div class="spark-wrapper">
                       <div class="spark-clone"></div>
                       <div class="spark"></div>
                     </div>
                   </div>
                   <div class="spark-three-container">
                     <div class="spark-wrapper">
                       <div class="spark-clone"></div>
                       <div class="spark"></div>
                     </div>
                   </div>
                   @endif
                </div>
             </a>
             <div class="py-0 dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="alertsDropdown">
                <div class="list-group">
                   @forelse (App\Helpers\NotificationHelper::getNotifications(3) as $notification)
                   <center>
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
                  </center>
                  @empty
                  <div class="container mt-3">
                  <center>
                    <p>
                        There are no new notifications 😀
                    </p>
                  </center>
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
