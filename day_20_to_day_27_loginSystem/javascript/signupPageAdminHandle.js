// Grabbin signup as admin  or signup as guest button
let signupAsAdmin_guest= document.getElementById('signupAsAdmin_guest');

// Adding event listener on click
signupAsAdmin_guest.addEventListener('click',()=>{
    // toggling d-none on the input field admin password
    document.getElementById('admin_password_formBox').classList.toggle('d-none');

    // Also changing the button innerText when toggled
    if(signupAsAdmin_guest.innerText=="Signup as Admin?"){
        signupAsAdmin_guest.innerText="Signup as Guest?";
    }
    else if(signupAsAdmin_guest.innerText=="Signup as Guest?"){
        signupAsAdmin_guest.innerText="Signup as Admin?";
    }
})