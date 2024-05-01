var count = 0;
document.getElementById("myButton").onclick = function(){
	count++;
	if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
	} else {
        var img = document.createElement("img");
        img.src = "https://i.postimg.cc/wT4wyZyP/icons8-winamp-480.png";
	    document.getElementById("demo").appendChild(img);
	}
}