const edit =  document.querySelectorAll('.edit');
const add =  document.querySelectorAll('.add');

let timesClicked = 0;
let timesClicked1 = 0;

edit.forEach(btn => btn.addEventListener('click', ()=>{
    timesClicked++;
    if (timesClicked%2==0) {
        const textarea = btn.parentNode.firstElementChild;
        const addr = textarea.value;
        const p = document.createElement('p');
        p.innerText = addr;
        p.className = 'col-6';
        btn.parentNode.replaceChild(p,textarea);
    } else {
        const address = btn.parentNode.firstElementChild;
        let text = document.createElement('TEXTAREA');
        text.cols = 10;
        text.rows = 1;
        text.className = "col-6"
        text.value = address.innerText;
        btn.parentNode.replaceChild(text,address)
    }
}))
add.forEach(btn => btn.addEventListener('click', ()=>{
    timesClicked1++;
    if (timesClicked1%2==0) {
        const textarea = btn.parentNode.firstElementChild;
        const addr = textarea.value;
        const p = document.createElement('p');
        p.innerText = addr;
        p.className = 'col-6';
        btn.parentNode.replaceChild(p,textarea);
    } else {
        const address = btn.parentNode.firstElementChild;
        let text = document.createElement('TEXTAREA');
        text.className = "col-6";
        text.cols = 10;
        text.rows = 1;
        btn.parentNode.replaceChild(text,address)
    }
}))

const select = document.querySelector('select');
select.addEventListener('input',() =>{
    const details = document.querySelector('.delivery');
    if(select.value == 'cod')
        details.innerText = "You'll pay when the package arrives at your doorstep."
    else if(select.value == "credit" )
        details.innerText = "Credit Card will be used to pay right now.";
    else
        details.innerText="";
})
