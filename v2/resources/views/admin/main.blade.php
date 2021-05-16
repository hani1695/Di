<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        @yield('ol-title')                        
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">                        
                        @yield('ol-menu')
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        @yield('content')       
    </div>
</div>