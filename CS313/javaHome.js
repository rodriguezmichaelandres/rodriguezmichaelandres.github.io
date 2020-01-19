function changeColor(){
	let colour = document.getElementById("colors").value;
	document.getElementById("n1").style.color = colour;

}

//SIGN IN
	function hideErrors() {
		var errorSpans = document.getElementsByClassName("error_msg");

		for (var i = 0; i < errorSpans.length; i++) {
			errorSpans[i].style["visibility"] = "hidden";
		}

		document.getElementById("reset").click();
	}

	function updateTotal() {
		var products = document.getElementsByClassName("product");
		var total = 0;

		for (var i = 0; i < products.length; i++) {
			if (products[i].checked) {
				total += parseFloat(products[i].value.split("|")[1]);
			}
		}

		document.getElementById("total").value = total.toFixed(2);
	}

	function validateForm(el) {
		var value = el.value;
		var id = el.id;

		var validation = "success";
		switch (id) {
			case "firstname":
			case "lastname":
			case "username":
			case "password":
				if (value.length < 1) {
					validation = "error";
				}
				break;
			case "phone":
				if (!value.match(/^\s*\d{3}-\d{3}-\d{4}\s*$/)) {
					validation = "error";
				}
				break;
			case "email":
				if (!value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
					validation = "error";
				}
				break;
			default:
				validation = "error";
		}

		if (validation === "error") {
			document.getElementById(id + "Error").style.visibility = "visible";
			document.getElementById(id).focus();
		} else {
			document.getElementById(id + "Error").style.visibility = "hidden";
		}

		return validation;
	}

	function resetForm() {
		hideErrors();
		document.getElementById("firstname").focus();
		return true;
	}

	function resetFormIn() {
		hideErrors();
		document.getElementById("username").focus();
		return true;
	}

	function doNotSubmit() {
		return false;
	}

	function recheckForm() {
		var inputs = document.getElementsByClassName("check_validation");

		var totalValidation = "success";
		for (var i = 0; i < inputs.length; i++) {
			currValidation = validateForm(inputs[i]);

			if (currValidation !== "success") {
				totalValidation = currValidation;
			}
		}

		if (totalValidation === "success") {
			return true;
		}
	}