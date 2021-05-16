@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Reporting</a></li>
        <li class="active">Bilan journalier</li>
    </ol>
@endsection
@section('content')
    <div class="row" style="margin-bottom: 100px;">
    
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Bilan journalier</strong></div>
                <div class="card-body card-block">
                
                    {{-- <div id="flot-pie" class="flot-pie-container" style="padding: 0px; position: relative;"><canvas class="flot-base" width="541" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 541px; height: 275px;"></canvas><canvas class="flot-overlay" width="541" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 541px; height: 275px;"></canvas><div class="legend"><div style="position: absolute; width: 51px; height: 120px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #8fc9fb;overflow:hidden"></div></div></td><td class="legendLabel"> Data 1</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #007BFF;overflow:hidden"></div></div></td><td class="legendLabel"> Data 2</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #00c292;overflow:hidden"></div></div></td><td class="legendLabel"> Data 3</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #F44336;overflow:hidden"></div></div></td><td class="legendLabel"> Data 4</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #32c39f;overflow:hidden"></div></div></td><td class="legendLabel"> Data 5</td></tr></tbody></table></div></div> --}}
                    <iframe style="border: none; width:100%; height: 1350px;"  src="http://192.168.112.2:8080/mapstore2/dashboard-embedded.html?connections=true#/3"></iframe>
                </div>
               
            </div>
        </div>
    </div>  
    
@endsection