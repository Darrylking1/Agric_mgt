let list = document.querySelectorAll(".navgation li");

function activelink(){
    list.forEach(item=>{
        item.classList.remove("hovered");
    })
    this.classListadd("hovered");
}

list.forEach(item=>{
    item.addEventListener("mouseover",activelink);
})

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function(){
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}


