/*------------------------------*\

    #LANDING

\*------------------------------*/

function activeTheLights(){	

	var nb_amp = $('.landing .icon-ampoule').length;

	//console.log(nb_amp);

	var waypoints = $('.icon-ampoule').waypoint({
		handler: function(direction) {
	    	//console.log(direction);
	    	//console.log(this);
	    	//console.log(this.element.className + '');
	    	$(this.element).addClass('active');
	  	},
	  	offset: '50%'
	});

}