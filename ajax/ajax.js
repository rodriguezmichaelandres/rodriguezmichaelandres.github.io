//var buttonCharge = document.getElementById('charge');

function chargeContent()
{
	//alert("runs");


var xhr = new XMLHttpRequest();

//xhr.open('GET', 'myText.txt', true);


xhr.onreadystatechange = function()
{
		console.log(xhr.readyState);
	if(this.readyState == 4 && this.status == 200)
	{
		//console.log("readyState = the answer is right & status = the state is right")
		document.getElementById("content").innerHTML = this.responseText;
		console.log(this.responseText);
	}
};
xhr.open('GET', "myText.txt", true);
xhr.send();
}
