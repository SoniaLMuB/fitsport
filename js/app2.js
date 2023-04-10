console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

loginBtn.addEventListener('click', (e) => {
	window.location.href='signup.php';
});

signupBtn.addEventListener('click', (e) => {
	window.location.href='login.php';
});