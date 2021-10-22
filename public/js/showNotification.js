Echo.channel("home")
.listen("NewMessage",(e)=>{
  let ulNotifi = document.getElementById("add-notification");
let li = document.createElement("li")
let alinlenk  = `<a href="show-notifictation/${e.message.id}" class="dropdown-item" > ${e.message.movie_name  } </a>`;
li.innerHTML = alinlenk;
ulNotifi.appendChild(li);
let incresNot = document.querySelector("#incres-not");
let newnot = parseInt(incresNot.textContent ) +1;
incresNot.innerText = newnot;
 
  
})  