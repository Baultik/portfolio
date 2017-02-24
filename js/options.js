/** rsCard Options */
var rsOptions = {
    rtl: false,	
	timeline: {
		topSpace: 50,
		itemsSpace: 25		
	},
	refSlider: {		
		speed: 800, //Slide transition duration (in ms)		
		auto: false, //Slides will automatically transition
		pause: 6000, //The amount of time (in ms) between each auto transition
		autoHover: true, //Auto show will pause when mouse hovers over slider		
		adaptiveHeight: true, //Dynamically adjust slider height based on each slide's height
		adaptiveHeightSpeed: 500 //Slide height transition duration (in ms).
	},
	postSlider: {
		speed: 800, //Slide transition duration (in ms)
		auto: true, //Slides will automatically transition
		pause: 6000, //The amount of time (in ms) between each auto transition
		autoHover: true //Auto show will pause when mouse hovers over slider
	},
	clientsSlider: {
		items: 5,
		singleItem: false,
		autoPlay: true,
		stopOnHover: true,
		itemsDesktopSmall: [992, 4],
		itemsTabletSmall: [767, 3],
		itemsMobile: [320, 1]
	},
    calendar: {
		startYear: '2017',
		startMonth: '0', // moths are starting form 0-11
		endYear: '2018',
		endMonth: '0',
		weekStart: 'Sunday', // possible values Sunday/Monday
		weekNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
		monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],		                
		busyDays: [ // new Date(year, month, day)
			new Date(2017, 3, 10),
			new Date(2017, 3, 8),
			new Date(2017, 3, 12),
			new Date(2017, 3, 30),
		]
    }	
};
