@php
    $events = \App\Evenement::orderBy('date_creation','desc')->get();
    $eventCount = $events->count();
    if ((Session::has('event_id')))
        $even = \App\Evenement::whereId(Session::get('event_id'))->first();
@endphp
<header id="header" class="header">  
    <div class="top-left">
        <div class="navbar-header"> 
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/dima2.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> 
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
            
        </div> 
    </div>
    <div class="top-right"> 
        
        <div class="header-menu"> 
            
            
           

            <div class="header-left">
               {{--  <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div> --}}
                @if ((Session::has('event_id')))                    
                <div class="dropdown for-notification">
                    <h5  >{{ $even->description }}</h5>
                </div>
                @endif
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="event" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="{{ (Session::has('event_id')) ? 'fas fa-calendar-check' : 'fas fa-calendar-plus' }}"></i>
                        <span class="count bg-info">{{ $eventCount }}</span>
                        
                    </button>
                    <div class="dropdown-menu" aria-labelledby="event">
                        @if (Session::has('event_id'))
                            <a href="{{ route('eventSelect.delete') }}"> <p class="red text-danger"><i class=" fas fa-ban"></i> <u>Annuler le sélectionnement</u></p></a>
                        @else
                            <p class="red text-info"><i class="fas fa-hand-pointer"></i> <u>Selectionner un évènement </u></p>
                        @endif

                        @foreach ($events as $event)
                            
                        <a class="dropdown-item media {{ ($event->id==Session::get('event_id')) ? 'bg-info' : '' }}" href="{{ route('eventSession.store',$event->id) }}">
                            <i class="fa fa-table {{ ($event->id==Session::get('event_id')) ? 'text-white' : '' }}"></i>
                            <p class="{{ ($event->id==Session::get('event_id')) ? 'text-white' : '' }}">{{ $event->description }}</p>
                        </a>
                        @endforeach
                        
                        
                    </div>
                </div>
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">0</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red text-danger"> <u> Liste de notifications </u></p>
                        {{-- <a class="dropdown-item media" href="#">
                            <i class="fa fa-check"></i>
                            <p>Server #1 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-info"></i>
                            <p>Server #2 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-warning"></i>
                            <p>Server #3 overloaded.</p>
                        </a> --}}
                    </div>
                </div>
                

                
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ empty(auth()->user()->image) ? asset('images/admin.jpg') : asset('storage/'.auth()->user()->image) }}" alt="User Avatar">
                    
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{ route('utilisateur.profil') }}"><i class="fa fa-user"></i>Mon Profil</a>                    

                    <a class="nav-link" href="#"><i class="fa fa-cog"></i>Paramètres</a>

                    <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Se déconnecter</a>
                </div>
                
            </div> 
            <div class="user-area dropdown float-right">
                <p class="mt-3">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</p>
                
            </div> 
        </div>  
    </div>
</header>