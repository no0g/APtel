var password = document.getElementById("pwd");
password.addEventListener('keyup', function() {

  var pwd = password.value

  // Reset if password length is zero
  if (pwd.length === 0) {
    document.getElementById("progresslabel").innerHTML = "";
    document.getElementById("progress").value = "0";
    return;
  }

  // Check progress
  var prog = [/[$@$!%*#?&]/, /[A-Z]/, /[0-9]/, /[a-z]/]
    .reduce((memo, test) => memo + test.test(pwd), 0);

  // Length must be at least 8 chars
  if(prog > 2 && pwd.length > 7){
    prog++;
  }

  // Display it
  var progress = "";
  var strength = "";

  switch (prog) {
    case 0:
    case 1:
    case 2:
      strength = "Password Strength: 25%";
      progress = "25";
      break;
    case 3:
      strength = "Password Strength: 50%";
      progress = "50";
      break;
    case 4:
      strength = "Password Strength: 75%";
      progress = "75";
      break;
    case 5:
      strength = "100% - Password strength is good";
      progress = "100";
      break;
  }
  document.getElementById("progresslabel").innerHTML = strength;
  document.getElementById("progress").value = progress;
});