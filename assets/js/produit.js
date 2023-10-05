const search = document.getElementById("search")
search.addEventListener("keyup", (e) => {
    const list = document.querySelectorAll("h5")
    for (let i = 0; i < list.length; i++) {
        if (!list[i].innerHTML.toLowerCase().includes(e.target.value.toLowerCase())) {
            list[i].parentNode.parentNode.style.display = 'none';
        } else {
            list[i].parentNode.parentNode.style.display = 'block';
        }
    }
})

const min= document.getElementById("minPrix")
min.addEventListener("change",(e)=>{
    const list=document.querySelectorAll(".small")
    for(let i = 0;i<list.length;i++){
        if(list[i].innerHTML<=e.target.value)
            list[i].parentNode.parentNode.parentNode.style.display = 'none';
        else
            list[i].parentNode.parentNode.parentNode.style.display = 'block';
    }
    document.getElementById('valueMin').innerHTML= e.target.value+"€"
})
