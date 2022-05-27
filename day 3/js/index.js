let myForm = document.getElementById('myForm');
myForm.addEventListener('submit', (e) => {
    e.preventDefault();
    alert("fuckyou")
})


// random number generator within range 
function generateRandom(maxLimit = 100) {
    let rand = Math.random() * maxLimit;
    rand = Math.floor(rand);
    return rand;
}
let colors = ['primary', 'secondary', 'success', 'warning', 'info', 'light', 'dark', 'danger'];
let colorChanger = document.getElementById('colorChanger');
let colorContainer = document.getElementById('colorContainer');

console.log(colorContainer);
colorChanger.addEventListener('click', () => {
    for (let colElement of colorContainer.children) {
        const randNum = generateRandom(colors.length);
        console.log(colElement);
        console.log(randNum);
        colElement.removeAttribute('class');
        colElement.className=`col bg-${colors[randNum]}`;

    }
})