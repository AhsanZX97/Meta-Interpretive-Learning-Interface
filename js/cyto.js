feather.replace();
var cy = cytoscape({
	container: document.getElementById('cy'),

	boxSelectionEnabled: false,
	autounselectify: true,

	style: [
		{
			selector: 'node',
			style: {
				shape: 'octagon',
				'background-color': '#2EC4B6',
				label: 'data(id)'
			}
		},
		{
			selector: 'edge',
			style: {
				'curve-style': 'bezier',
				'label': 'data(label)', // maps to data.label
				'target-arrow-shape': 'triangle' // adds directional arrows
			}
		}
	],
	layout: {
		name: 'breadthfirst',
		directed: true,
		padding: 10
	  }

	
	}); // cy init

	cy.on('tap', 'node', function(){
	  var nodes = this;
	  var tapped = nodes;
	  var food = [];

	  nodes.addClass('eater');

	  for(;;){
		var connectedEdges = nodes.connectedEdges(function(el){
		  return !el.target().anySame( nodes );
		});

		var connectedNodes = connectedEdges.targets();

		Array.prototype.push.apply( food, connectedNodes );

		nodes = connectedNodes;

		if( nodes.empty() ){ break; }
	  }

	  var delay = 0;
	  var duration = 500;
	  for( var i = food.length - 1; i >= 0; i-- ){ (function(){
		var thisFood = food[i];
		var eater = thisFood.connectedEdges(function(el){
		  return el.target().same(thisFood);
		}).source();

		thisFood.delay( delay, function(){
		  eater.addClass('eating');
		} ).animate({
		  position: eater.position(),
		  css: {
			'width': 10,
			'height': 10,
			'border-width': 0,
			'opacity': 0
		  }
		}, {
		  duration: duration,
		  complete: function(){
			thisFood.remove();
		  }
		});

		delay += duration;
	  })(); } // for

	}); // on tap

var cy2 = (window.cy2 = cytoscape({
		container: document.getElementById("cy2"),
	
		boxSelectionEnabled: false,
		autounselectify: true,
	
		style: [
			{
				selector: "node",
				css: {
					content: "data(id)",
					"text-valign": "center",
					"text-halign": "center",
					height: "60px",
					width: "100px",
					shape: "rectangle",
					"background-color": "data(faveColor)"
				}
			},
			{
				selector: "edge",
				css: {
					"curve-style": "bezier",
					"control-point-step-size": 40,
					"target-arrow-shape": "triangle"
				}
			}
		],
	
		elements: {
			nodes: [
				{ data: { id: "Top", faveColor: "#2763c4" } },
				{ data: { id: "yes", faveColor: "#37a32d" } },
				{ data: { id: "no", faveColor: "#2763c4" } },
				{ data: { id: "Third", faveColor: "#2763c4" } },
				{ data: { id: "Fourth", faveColor: "#56a9f7" } }
			],
			edges: [
				{ data: { source: "Top", target: "yes" } },
				{ data: { source: "Top", target: "no" } },
				{ data: { source: "no", target: "Third" } },
				{ data: { source: "Third", target: "Fourth" } },
				{ data: { source: "Fourth", target: "Third" } }
			]
		},
		layout: {
			name: "random"
		}
	}));
	