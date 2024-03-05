
function handleRegister(){
   let email = document.querySelector(".email").value
   let password = document.querySelector(".password").value
   let userName = document.querySelector(".userName").value

   let user = {
      "email":email,
      "password":password,
      "name":userName
   }



	let params = {
   "method": "POST",
   "headers": {
      "Content-Type": "application/json; charset=utf-8"
   },
   "body": JSON.stringify(user)
}
 
fetch("./script.php", params).then((res)=> res.text()).then((data)=>console.log(data))
}