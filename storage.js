localStorageShow();
function localStorageShow()
{
	x = new Boolean(false);
	if(x)
	{
		getLocalStorage();
	}
	else
	{
		saveLocalStorage();
		getLocalStorage();
		x = false;
	}
		
}
function getLocalStorage()
{
if(localStorage.getItem("nameLS"))
{
let name = localStorage.getItem("nameLS");
let age = localStorage.getItem("ageLS");
let email = localStorage.getItem("emailLS");
let person = JSON.parse(localStorage.getItem("personLS"));
console.log(name);
console.log(age);
console.log(email);
console.log(person);

document.write("Your data are: ", name, " ", age, " ", email);
}
else
{
console.log("Empty");
}
}

function saveLocalStorage()
{

let namePerson = prompt("Name");
let agePerson = prompt("Age?");
let emailPerson = prompt("Email?");

let person = { 
name:namePerson,
age:agePerson,
email:emailPerson
};


localStorage.setItem("nameLS", namePerson);
localStorage.setItem("ageLS", agePerson);
localStorage.setItem("emailLS", emailPerson);
localStorage.setItem("personLS", JSON.stringify(person));


}
