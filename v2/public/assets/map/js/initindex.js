window.onload = init;

function init(){


	

	var mousePositionControl = new ol.control.MousePosition({
		className: 'custom-mouse-position',
		target: document.getElementById('location'),
		coordinateFormat: ol.coordinate.createStringXY(5),
		undefinedHTML: ' '
	  });

	 
	  
      var tiled = new ol.layer.Tile({
	    title: 'TR',
        visible: true,
        source: new ol.source.TileWMS({
          url: 'http://192.168.112.2:8080/geoserver/DIMA/wms',
          params: {
                   'VERSION': '1.1.1',
                   tiled: true,
                "LAYERS": 't_fiches_dommages',
               
				
                
             
          }
        })
      });

	  var formatWFS = new ol.format.WFS();
	  var projection = new ol.proj.Projection({
		code: 'EPSG:4326',
		units: 'm',
		axisOrientation: 'neu'
	});

	



var layerWFS1 = new ol.layer.Vector({
	title: 'Fiche',
	source: new ol.source.Vector({
		
		loader: function (extent) {
			$.ajax('http://192.168.112.2:8080/geoserver/DIMA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=DIMA%3At_fiches_dommages&maxFeatures=50&outputFormat=text%2Fjavascript', {
				type: 'GET',
				
				
				dataType: 'jsonp',
				jsonpCallback:'callback:loadFeatures',
				jsonp: 'format_options',
				
			})
		},
	
		strategy: ol.loadingstrategy.bbox,
		projection: 'EPSG:4326',
		
	})
});

window.loadFeatures = function (response) {
	layerWFS1
	.getSource()
	.addFeatures(new ol.format.GeoJSON().readFeatures(response));
};


window.loadFeatures = function (response) {
	layerWFS1
	.getSource()
	.addFeatures(new ol.format.GeoJSON().readFeatures(response));
};

var container = document.getElementById('popup');
///var content = document.getElementById('popup-content');
var closer = document.getElementById('popup-closer');


var overlay = new ol.Overlay({
    element: container,
    autoPan: true,
    autoPanAnimation: {
      duration: 250,
    },
  });
closer.onclick = function () {
    overlay.setPosition(undefined);
    closer.blur();
    return false;
  };

	// Overlays
	var overlays = new ol.layer.Group({
		title: 'Overlays',
		layers: [
			layerWFS1,
			tiled,
		 	
		]
	});

    var osm = new ol.layer.Tile({ source: new ol.source.OSM() });
	// Baselayers
	var baselayers = new ol.layer.Group({
		title: 'Baselayers',
		layers: [
			new ol.layer.Tile({
				title: 'ESRI Topo Map',
				type: 'base',				
				source: new ol.source.XYZ({
					url: 'http://server.arcgisonline.com/ArcGIS/rest/services/' +
				    	'World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
				})
			}),	new ol.layer.Tile({
				title: 'Google Satellite Map',
				type: 'base',				
				source: new ol.source.XYZ({
					url: 'http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}&s=Ga'
				})
			}),		
			new ol.layer.Tile({
				title: 'ESRI Satellite Map',
				type: 'base',				
				source: new ol.source.XYZ({
					url: 'http://server.arcgisonline.com/ArcGIS/rest/services/' +
				    	'World_Imagery/MapServer/tile/{z}/{y}/{x}'
				})
			}),			
			
			new ol.layer.Tile({
				title: 'ESRI Street Map',
				type: 'base',
				source: new ol.source.XYZ({
					url: 'http://server.arcgisonline.com/ArcGIS/rest/services/' +
				    	'World_Street_Map/MapServer/tile/{z}/{y}/{x}'
				})
			}),
			osm
		]
	});


    
    
	// Map Layers
	var layers = [
	//	countiesLayer,
		baselayers,
		overlays
	];




	// Map Controls
  	var controls = [
		new ol.control.Zoom(),
  		new ol.control.OverviewMap(),
  		new ol.control.Attribution(),
  		
  		new ol.control.Rotate()
  	];

  	// Map View
	var view = new ol.View({
		projection: 'EPSG:4326',
		center: [2.91, 36.6],
		zoom: 4,
		
		
	});

	var formatWFS = new ol.format.WFS();



var xs = new XMLSerializer();




var interaction;

var interactionSelectPointerMove = new ol.interaction.Select({
    condition: ol.events.condition.pointerMove
});

var interactionSelect = new ol.interaction.Select({
    style: new ol.style.Style({
        stroke: new ol.style.Stroke({
            color: '#FF2828'
        })
    })
});

var interactionSnap = new ol.interaction.Snap({
    source: layerWFS1.getSource()
});


	
	// Map
	var map = new ol.Map({
		layers: layers,
		controls: controls,
        renderer: 'canvas',
        overlays: [overlay],
		interactions: [
			interactionSelectPointerMove,
			new ol.interaction.MouseWheelZoom(),
			new ol.interaction.DragPan()
		],
		
		target: 'map',
		view: view
	});

	
 layerWFS1.getSource().once('change', function(e) {
		map.getView().fit(e.target.getExtent(),map.getSize(),{"maxZoom":19},{duration: 2500})
	  });

var select = new ol.interaction.Select();
  map.addInteraction(select);

  var selectedFeatures = select.getFeatures();
  console.log(selectedFeatures.getArray());
  

  var dragBox = new ol.interaction.DragBox({
    condition: ol.events.condition.platformModifierKeyOnly
  });

  map.addInteraction(dragBox);

  var infoBox = document.getElementById('info');


  dragBox.on('boxend', function() {
    // features that intersect the box are added to the collection of
    // selected features, and their names are displayed in the "info"
    // div
    var info = [];
    var extent = dragBox.getGeometry().getExtent();
    layerWFS1.getSource().forEachFeatureIntersectingExtent(extent, function(feature) {
      selectedFeatures.push(feature);
      info.push(feature.get('code_fiche'));
    });
    if (info.length > 0) {
      infoBox.innerHTML = info.join(', ');
    }
    var gml = new ol.format.GML({
        srsName: 'EPSG:4326'
    });
   
    console.log(gml.writeFeatures(selectedFeatures.getArray()));
   
  });
  
  
  
  
  var gml = new ol.format.GML({
    srsName: 'EPSG:4326'
});
  console.log(gml.writeFeatures(selectedFeatures.getArray()));


 // alert (JSON.stringify(selectedFeatures.getArray()));
// clear selection when drawing a new box and when clicking on the map
dragBox.on('boxstart', function() {
    selectedFeatures.clear();
    infoBox.innerHTML = '&nbsp;';
  });

  var content = document.getElementById('popup-content');
  selectedFeatures.on(['add', 'remove'], function () {

    
    var names = selectedFeatures.getArray().map(function (feature) {
      return feature.get('code_fiche');
    });
    if (names.length > 0) {
      infoBox.innerHTML = names.join(', ');
      content.innerHTML = '<p>Vous avez cliquez sur la fiche avec le code:</p><code>' + names + '</code> '+' &nbsp;<div><a href="/ficheevaluationdetaille/'+names+'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Plus de detaille</a></div>';
      
    } else {
      infoBox.innerHTML = 'No Fiche selected';
    }
  });

  map.on('singleclick', function (evt) {
    var coordinate = evt.coordinate;
   // var hdms = toStringHDMS(toLonLat(coordinate));
   console.log(gml.writeFeatures(selectedFeatures.getArray()));
    content.innerHTML = '<p>No Fiche selected:</p><code>' +''+ '</code>';
    overlay.setPosition(coordinate);
  });


  map.on('click', function() {
    
    selectedFeatures.clear();
    infoBox.innerHTML = '&nbsp;';
    
  });





}