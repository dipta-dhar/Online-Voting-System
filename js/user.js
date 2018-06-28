function loginValidate() {
	var name = document.loginForm.name.value;
	var pass = document.loginForm.pass.value;
	var cpass = document.loginForm.cpass.value;
	
	var valid = true;
	var name_re = /^[A-Za-z ][A-Za-z .]+{2,}$/;
	
	if (!name_re.test(name)){
	// focus;
		return false;
	}
	if (pass != cpass) {
		// 
		return false;
	}
	
	
	return false;
}