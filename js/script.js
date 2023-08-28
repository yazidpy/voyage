
 const connect = document.querySelectorAll(".connect");
 Array.from(connect).forEach(function(btn) {
     btn.addEventListener("click", function() {
         let form = document.getElementById("form_connexion")
         form.style.display = "flex";
         let tout = document.querySelector(".contain");
          tout.style.filter = "blur(5px)"; 
             window.onscroll = () =>{
              form.style.display="none";
              tout.style.filter="none";
             
          }
     }); 
 });


    




