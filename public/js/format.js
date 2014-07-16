// Using php.default.min.js for php-style functions (http://phpjs.org/)

function convertToTime(time) {
	time = substr(time, 0, -6); // remove timezone offset
	time = time.replace('T', ' '); // The js strtotime function likes format: strtotime('2012-11-06 16:40')
	time = strtotime(time);
	time = date("g:i a", time);
	
	return time;
}

function convertToDate(time) {
    time = substr(time, 0, -6);
	time = strtotime(time);
	time = date("F j", time);
	
	return time;
}

function convertToMoney(money) {
	money = substr(money, 0, -3); 
	return "$" + money;
}

function convertToDuration(duration) {
	hours = floor(duration / 60);
	minutes = duration - (hours * 60);
	return hours + "h"+ " " + minutes + "m";
}

function simpleMoney(money) {
    length = count(money);
    money = substr(money, 0, -3);
    
    return money;
}

function convertToStopCount(stops) {
	return stops == 0 ? "Non-stop" : stops + " Stop" + (stops > 1 ? "s" : "");
}

function convertToCarrier(carrier) {
	switch (carrier) {
		case "AC":
			return "Air Canada";
		case "UA":
			return "United Airlines";
		case "WS":
			return "Westjet";
		case "DL":
			return "Delta";
		case "AA":
			return "American Airlines";
		case "AF" :
			return "Air France";
		case "KL" :
			return "KLM";
		case "AZ" :
			return "Alitalia";
		case "LH" :
			return "Lufthansa";
		case "LX" :
			return "Swiss International Air Lines";
		case "9W" :
			return "Jet Airways";
		case "BA" :
			return "British Airways";
		case "IB" :
			return "Iberia";
		case "LO" :
			return "LOT Polish Airlines";
		case "OS" :
			return "Austrian Airlines";
		case "TS" :
			return "Air Transat";
		case "SN" :
			return "SN Brussels Airlines";
		case "US" :
			return "US Airways";
		case "TK" :
			return "Turkish Airlines";
		case "SK" :
			return "Scandinavian Airlines";
		case "AS":
			return "Alaska Airlines";
		default:
			return carrier;
	}
}

