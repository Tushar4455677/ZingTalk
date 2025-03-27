const container = document.querySelector('.container');
const loginlink = document.querySelector('.signinlink');
const registerlink = document.querySelector('.signuplink');
registerlink.addEventListener('click',()=>
{
    container.classList.add('active');
})
loginlink.addEventListener('click',()=>
    {
        container.classList.remove('active');
    })