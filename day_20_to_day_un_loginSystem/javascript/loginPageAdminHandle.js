// Grabbin login as admin  or login as guest button
let loginAsAdmin_guest= document.getElementById('loginAsAdmin_guest');

// Adding event listener on click
loginAsAdmin_guest.addEventListener('click',()=>{
    // toggling d-none on the input field admin password
    document.getElementById('admin_password_formBox').classList.toggle('d-none');

    // Also changing the button innerText when toggled
    if(loginAsAdmin_guest.innerText=="Login as Admin?"){
        loginAsAdmin_guest.innerText="Login as Guest?";
    }
    else if(loginAsAdmin_guest.innerText=="Login as Guest?"){
        loginAsAdmin_guest.innerText="Login as Admin?";
    }
})