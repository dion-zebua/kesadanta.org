
let formKu = document.querySelector("#contactForm");
let nama = document.querySelector("#contactForm #name");
let email = document.querySelector("#contactForm #email");
let nomor = document.querySelector("#contactForm #phone");
let pesan = document.querySelector("#contactForm #message");  

formKu.addEventListener('click',e => {

    fetch(`=Nama : ${nama.value} | No-HP : ${nomor.value} | Email : ${email.value} | Pesan : ${pesan.value}`,{
        method: "GET"
    });

    e.preventDefault();

});
