/**
 * Calculates and displays a car route from the Brandenburg Gate in the centre of Berlin
 * to Friedrichstraße Railway Station.
 *
 * A full list of available request parameters can be found in the Routing API documentation.
 * see: http://developer.here.com/rest-apis/documentation/routing/topics/resource-calculate-route.html
 *
 * @param {H.service.Platform} platform A stub class to access HERE services
 */


   
  
var lat=undefined;
var long=undefined;
var dlat=undefined;
var dlong=undefined;
function GG(lat, long, dlat, dlong) {
  this.lat = lat;
  this.long = long;
  this.dlat = dlat;
  this.dlong = dlong;

  // Create markers for source and destination
  calculateRouteFromAtoB(platform);
}


var router=undefined;
var lastobj=undefined;
if(lastobj!=undefined)
{
  console.log(lastobj);
  map.removeObject(lastobj);
}
function calculateRouteFromAtoB(platform) {
  var origin=lat+','+long;
  if(router!=undefined)
  {
  
  }
  console.log(origin);
  router = platform.getRoutingService(null, 8),// Check if currentRoute exists and is a valid object
  
  
      routeRequestParams = {
        routingMode: 'short',
        transportMode: 'truck',
        origin: ''+origin+'', // Brandenburg Gate
        // destination: ''+''+document.querySelector(".myForm input[name='dlat']").value+','+document.querySelector(".myForm input[name='dlong']").value+'', // Friedrichstraße Railway Station
        // origin: '21.1702,72.8311', // Brandenburg Gate
        destination: ''+document.querySelector(".myForm input[name='dlat']").value+','+document.querySelector(".myForm input[name='dlong']").value+'', // Friedrichstraße Railway Station
        // destination: '21.5346,71.8275', // Friedrichstraße Railway Station
        return: 'polyline,turnByTurnActions,actions,instructions,travelSummary'
      };
      console.log(routeRequestParams);

  router.calculateRoute(
    routeRequestParams,
    onSuccess,
    onError
  );
}

/**
 * This function will be called once the Routing REST API provides a response
 * @param {Object} result A JSONP object representing the calculated route
 *
 * see: http://developer.here.com/rest-apis/documentation/routing/topics/resource-type-calculate-route.html
 */
function onSuccess(result) {
  var route = result.routes[0];

  /*
   * The styling of the route response on the map is entirely under the developer's control.
   * A representative styling can be found the full JS + HTML code of this example
   * in the functions below:
   */
  addRouteShapeToMap(route);
  addManueversToMap(route);
  addsourceDestination(route);
  addWaypointsToPanel(route);
  addManueversToPanel(route);
  addSummaryToPanel(route);
  
  // ... etc.
}

/**
 * This function will be called if a communication error occurs during the JSON-P request
 * @param {Object} error The error message received.
 */
function onError(error) {
  alert('Can\'t reach the remote server');
}

/**
 * Boilerplate map initialization code starts below:
 */

// set up containers for the map + panel
var mapContainer = document.getElementById('map'),
  routeInstructionsContainer = document.getElementById('panel');

// Step 1: initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
  apikey: 'oGRqtyo2JrbHNk5x3jnx0_XCyeDHNr1qXW_U7xlg9Pc'
});

var defaultLayers = platform.createDefaultLayers();
var map=undefined;


function removeObjectsbyid(id){
  for(object of map.getobjects()){
    if(object.id==id)
    {
      console.log(object);
      map.removeObject(object);
    }
  }
}

// Step 2: initialize a map - this map is centered over Berlin
 map = new H.Map(mapContainer,
  defaultLayers.vector.normal.map, {
  center: {lat: 21.1702, lng: 72.8311},
  zoom: 13,
  pixelRatio: window.devicePixelRatio || 1
});

// add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

// Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers);

// Hold a reference to any infobubble opened
var bubble;

/**
 * Opens/Closes a infobubble
 * @param {H.geo.Point} position The location on the map.
 * @param {String} text          The contents of the infobubble.
 */
function openBubble(position, text) {
  if (!bubble) {
    bubble = new H.ui.InfoBubble(
      position,
      // The FO property holds the province name.
      {content: text});
    ui.addBubble(bubble);
  } else {
    bubble.setPosition(position);
    bubble.setContent(text);
    bubble.open();
  }
}

/**
 * Creates a H.map.Polyline from the shape of the route and adds it to the map.
 * @param {Object} route A route as received from the H.service.RoutingService
 */
var polyline="";
function addRouteShapeToMap(route) {
  route.sections.forEach((section) => {
    // decode LineString from the flexible polyline
    let linestring = H.geo.LineString.fromFlexiblePolyline(section.polyline);
    if(polyline!="")
    {
      map.removeObject(polyline);
      console.log("polyline removal");
      
    }
    // Create a polyline to display the route:
    polyline = new H.map.Polyline(linestring, {
      style: {
        lineWidth: 4,
        strokeColor: 'rgba(0, 128, 255, 0.7)'
      }
    });
    
    // Add the polyline to the map
    map.addObject(polyline);
    // And zoom to its bounding rectangle
    map.getViewModel().setLookAtData({
      bounds: polyline.getBoundingBox()
    });
  });
}
    
    /**
 * Creates a series of H.map.Marker points from the route and adds them to the map.
 * @param {Object} route A route as received from the H.service.RoutingService
 */


function addManueversToMap(route) {
 
  var svgMarkup = '<svg width="18" height="18" ' +
    'xmlns="http://www.w3.org/2000/svg">' +
    '<circle cx="8" cy="8" r="8" ' +
      'fill="#1b468d" stroke="white" stroke-width="1" />' +
    '</svg>',
    dotIcon = new H.map.Icon(svgMarkup, {anchor: {x:8, y:8}}),
      
    group = new H.map.Group(),
    i,
    j;
  
  route.sections.forEach((section) => {
    let poly = H.geo.LineString.fromFlexiblePolyline(section.polyline).getLatLngAltArray();
    
    let actions = section.actions;
    // Add a marker for each maneuver
    

    for (i = 0; i < actions.length; i += 1) {
           
      let action = actions[i];
      this.marker = new H.map.Marker({
        lat: poly[action.offset * 3],
        lng: poly[action.offset * 3 + 1]},
        {icon: dotIcon});
      this.marker.instruction = action.instruction;
      // console.log(marker);
      group.addObject(this.marker);
      
    }

    group.addEventListener('tap', function (evt) {
      map.setCenter(evt.target.getGeometry());
      openBubble(evt.target.getGeometry(), evt.target.instruction);
    }, false);

    // Add the maneuvers group to the map
    group.id='router';
    map.addObject(group);
       
    $("#daddress").on("input",async function(){
      await new Promise(r=>setTimeout(r,100));
      if(group!="")
      {
        map.removeObject(group);
      group="";
      }
      
    })
    
  });
  
}

/**
 * Creates a series of H.map.Marker points from the route and adds them to the map.
 * @param {Object} route A route as received from the H.service.RoutingService
 */
function addWaypointsToPanel(route) {
  var nodeH3 = document.createElement('h3'),
    labels = [];

  route.sections.forEach((section) => {
    labels.push(
      section.turnByTurnActions[0].nextRoad.name[0].value)
    labels.push(
      section.turnByTurnActions[section.turnByTurnActions.length - 1].currentRoad.name[0].value)
  });

  nodeH3.textContent = labels.join(' - ');
  routeInstructionsContainer.innerHTML = '';
  routeInstructionsContainer.appendChild(nodeH3);
}

/**
 * Creates a series of H.map.Marker points from the route and adds them to the map.
 * @param {Object} route A route as received from the H.service.RoutingService
 */
function addSummaryToPanel(route) {
  let duration = 0,
    distance = 0;

  route.sections.forEach((section) => {
    distance += section.travelSummary.length;
    duration += section.travelSummary.duration;
  });

  var summaryDiv = document.createElement('div'),
    content = '<b>Total distance</b>: ' + distance + 'm. <br />' +
      '<b>Travel Time</b>: ' + toMMSS(duration) + ' (in current traffic)';

  summaryDiv.style.fontSize = 'small';
  summaryDiv.style.marginLeft = '5%';
  summaryDiv.style.marginRight = '5%';
  summaryDiv.innerHTML = content;
  routeInstructionsContainer.appendChild(summaryDiv);
}

/**
 * Creates a series of H.map.Marker points from the route and adds them to the map.
 * @param {Object} route A route as received from the H.service.RoutingService
 */
function addManueversToPanel(route) {
  var nodeOL = document.createElement('ol');

  nodeOL.style.fontSize = 'small';
  nodeOL.style.marginLeft ='5%';
  nodeOL.style.marginRight ='5%';
  nodeOL.className = 'directions';

  route.sections.forEach((section) => {
    section.actions.forEach((action, idx) => {
      var li = document.createElement('li'),
        spanArrow = document.createElement('span'),
        spanInstruction = document.createElement('span');

      spanArrow.className = 'arrow ' + (action.direction || '') + action.action;
      spanInstruction.innerHTML = section.actions[idx].instruction;
      li.appendChild(spanArrow);
      li.appendChild(spanInstruction);

      nodeOL.appendChild(li);
    });
  });

  routeInstructionsContainer.appendChild(nodeOL);
}
function addsourceDestination(route)
{
  console.log("sourceMarker placed");
    // Create a source marker with a blue point icon
    var sourceIcon = new H.map.Icon('images/source.png', {size: {w: 35, h: 35}});
var destinationIcon = new H.map.Icon('images/destination.png', {size: {w: 35, h: 35}});
    
    // Create markers for source and destination with custom icons
    var sourceMarker = new H.map.Marker({ lat: document.querySelector(".myForm input[name='latitude']").value, lng: long }, { icon: sourceIcon });
    var destinationMarker = new H.map.Marker({ lat: document.querySelector(".myForm input[name='dlat']").value, lng:document.querySelector(".myForm input[name='dlong']").value }, { icon: destinationIcon });
    console.log(sourceMarker);
    // Add markers to the map
    if(map!=undefined)
    {
      console.log("map not empty");
      map.addObject(sourceMarker);
      map.addObject(destinationMarker);
    }
    else
    {
      console.log("map is empty");
    }
    $("#daddress").on("input",async function(){
      await new Promise(r=>setTimeout(r,100));
      if(sourceMarker!="")
      {
        map.removeObject(sourceMarker);
        map.removeObject(destinationMarker);
        sourceMarker="";
      }
      
    })
    // map.addObject(destinationMarker);
}
function toMMSS(duration) {
  return Math.floor(duration / 60) + ' minutes ' + (duration % 60) + ' seconds.';
}

// Now use the map as required...

