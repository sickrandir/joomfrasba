window.addEvent('load', function() {
	if (document.body.id == '') {

		if (tempus != false) {
			timeofday = tempus;
			document.body.id=tempus;
		} else {
			datetoday = new Date();
			timenow=datetoday.getTime();
			datetoday.setTime(timenow);
			thehour = datetoday.getHours();

			if (thehour >= 20)
			 timeofday = "night";
			else if (thehour >= 17)
			 timeofday = "dusk";
			else if (thehour >= 9)
			 timeofday = "day";
			else if (thehour >= 5)
			 timeofday = "dawn";
			else
			 timeofday = "night";

			document.body.id=timeofday;
			
		}
		Cookie.set('dim-tempus', timeofday, {duration: 1/24,path: "/"});
	}
});