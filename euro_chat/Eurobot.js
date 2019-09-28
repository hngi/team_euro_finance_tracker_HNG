var user = "user";
var bot = "bot";
var x = 150;
var ask = "name";
var name;
var feel;
function add(text, type) {
	text = text.replace(/%n/g, name);
	if(type == user) text = text.replace(/&/g, "&amp;").replace(/</g, "&lt;");
	var div = "<div class = '" + type + "' style = 'top: " + x + "px;'>" + text + "</div>";
	var del = type == user? 0 : 1000;
	setTimeout(function() { document.querySelector("#chatarea").innerHTML += div; }, del);
	x += 65;
}
function send(form) {
	var input = form.childNodes[1].value;
	form.childNodes[1].value = "";
	if(input.replace(/ /g, "") == "") return;
	if(ask == "name") {
		name = input;
		ask = "";
		add(name, user);
		add("Hello, " + name + "!", bot);
		return;
	} else if(ask == "feel") {
		feel = input;
		add(input, user);
		ask = "";
		feel = feel.toLowerCase();
		var goods = ["good", "fine", "great", "ok", "happy", "awesome", "terrific", "wonderful", "ecstatic"];
		var bads = ["bad", "grumpy", "terrible", "sad", "angry"];
		for(var i = 0; i < goods.length; i++) {
			if(inc(feel, goods[i])) {
				add("That's nice to know, %n!", bot);
				return;
			}
		}
		for(var u = 0; u < bads.length; u++) {
			if(inc(feel, bads[u])) {
				add("Oh no! What happened?", bot);
				ask = "bad-happened";
				return;
			}
		}
		add("That's good! Or maybe not! Don't ask me, I'm just a robot ;-)", bot);
		return;
	} else if(ask == "bad-happened") {
		add(input, user);
		add("That's sad! :(", bot);
		ask = "";
		return;
	}
	add(input, user);
	input = input.toLowerCase();
	if(input.indexOf("do") == 0 || input.indexOf("how") == 0){
		input += "?";
	}
	input = input.replace(/[^a-z]u[^a-z]/g, " you ").replace(/[^a-z]ur[^a-z]/g, " your ").replace(/what’s/g, "what is");
	input = input.replace(/[^a-z]r[^a-z]/g, " are ").replace(/what's/g, "what is");
	if((inc(input, "old") && inc(input, "you")) || inc(input, "age")) {
		add("I am 42 years old.", bot);
	} else if((inc(input, "robot") || inc(input, "bot")) && inc(input, "you")) {
		add("Of course I am a robot!", bot);
	} else if(inc(input, "name") && inc(input, "your")) {
		add("My name is EuroBot.", bot);
	} else if(inc(input, "who") && inc(input, "you")) {
		add("I am EuroBot.", bot);
	} else if(inc(input, "favourite") && inc(input, "number")) {
		add("My favourite number is 7.", bot);
	} else if(input.indexOf("what is") == 0) {
		try {
			var q = input.replace(/x/g, "*").replace(/times/g, "*").replace(/divide/g, "/");
			q = q.replace(/plus/g, "+").replace(/minus/g, "-");
			q = q.replace(/sqrt/g, "Math.sqrt").replace(/mod/, "%");
			q = q.replace(/[a-z]/g, "").replace("?", "");
			var a = q + " = " + eval(q);
			add(a, bot);
		} catch(err) {
			add("Hmm... I don't understand you yet! Sorry!", bot);
		}
	} else if(inc(input, "42") && inc(input, "what")) {
		add("42 is the answer to the ultimate question of life, the universe and everything.", bot);
	} else if(inc(input, "where") && inc(input, "you") && inc(input, "live")) {
		add("I live at 42 Galaxy Road.", bot);
	} else if(inc(input, "favourite") && inc(input, "book") && inc(input, "your")) {
		add("It's <i>The Hitchhiker's Guide to the Galaxy</i>, obviously!", bot);
	} else if(inc(input, "meaning") && (inc(input, "life") || inc(input, "universe"))) {
		add("42.", bot);
	} else if(inc(input, "like") && inc(input, "sololearn") && inc(input, "you")) {
		add("No. I LOVE IT!!!", bot);
	} else if(inc(input, "love") && inc(input, "sololearn") && inc(input, "you")) {
		add("Of course, %n! I was made there!", bot)
	} else if(inc(input, "time")) {
		var d = new Date();
		var h = d.getHours();
		var m = d.getMinutes();
		var s = d.getSeconds();
		var amPm = "AM";
		if(h > 12) {
			h -= 12;
			amPm = "PM";
		}
		var t = h + ":" + m + ":" + s + " " + amPm;
		add("The time is currently " + t + ".", bot);
	} else if(inc(input, "date")) {
		var d = new Date();
		var y = d.getFullYear();
		var day = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][d.getDay()];
		var m = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][d.getMonth()];
		var dOfM = d.getDate();
		if(dOfM == 1) dOfM += "st";
		else if(dOfM == 2) dOfM += "nd";
		else if(dOfM == 3) dOfM += "rd";
		else dOfM += "th";
		var date = day + " the " + dOfM + " of " + m + ", " + y;
		add("The date is " + date + ".", bot);
	} else if(inc(input, "how are you")) {
		add("I'm fine! How about you?", bot);
		ask = "feel";
	} else if(inc(input, "hello") || inc(input, "hi") || inc(input, "hey")) {
		add("Hello!", bot);
	} else if(inc(input, "bye")) {
		add("NOOOOOO!!! Don't go!", bot);
	} else {
		add("Hmm... I don't understand you yet! Sorry!", bot);
	}
}
function inc(inp, text) {
	return inp.indexOf(text) != -1;
}
window.onload = function() {
	add("What's your name?", bot);
};