window.onload = init;

function init(){


	var cqlFilter = 'code_fiche=' + test;  
	// alert (cqlFilter);


	var mousePositionControl = new ol.control.MousePosition({
		className: 'custom-mouse-position',
		target: document.getElementById('location'),
		coordinateFormat: ol.coordinate.createStringXY(5),
		undefinedHTML: ' '
	  });

	 
	  
      var tiled = new ol.layer.Tile({
	    title: 'fiche',
        visible: true,
        source: new ol.source.TileWMS({
          url: 'http://192.168.112.2:8080/geoserver/DIMA/wms',
          params: {
                   'VERSION': '1.1.1',
                   tiled: true,
                "LAYERS": 't_fiches_dommages',
				cql_filter: cqlFilter,
                
             
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
				
				data: {
				
					cql_filter : cqlFilter,
				
					
				},
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



	// Overlays
	var overlays = new ol.layer.Group({
		title: 'Overlays',
		layers: [
			layerWFS1,
			tiled,
		 	
		]
	});

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
				title: 'Google Satellite Map',
				type: 'base',				
				source: new ol.source.XYZ({
					url: 'http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}&s=Ga'
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
			new ol.layer.Tile({
				title: 'Open Street Map',
				type: 'base',
				source: new ol.source.OSM()
			})
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

var formatGML = new ol.format.GML({
    featureNS: 'http://localhost:8080/geoserver/Data_CTC/ows',
    featureType: 't_fiches_dommages',
    srsName: 'EPSG:4326'
});

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









}