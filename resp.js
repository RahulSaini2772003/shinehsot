burger = document.querySelector('.burger')
navbar = document.querySelector('.navbar')
btn = document.querySelector('.btn')
clh =document.querySelector('.h') 
cla =document.querySelector('.a') 
cle =document.querySelector('.e') 
cls =document.querySelector('.s') 
claa =document.querySelector('.aa') 
clc =document.querySelector('.c') 

burger.addEventListener('click', ()=>{
    navbar.classList.toggle('h-nav');
    btn.classList.toggle('v-opp');
    clh.classList.toggle('v-op');
    cla.classList.toggle('v-op');
    cle.classList.toggle('v-op');
    cls.classList.toggle('v-op');
    claa.classList.toggle('v-op');
    clc.classList.toggle('v-op');
})