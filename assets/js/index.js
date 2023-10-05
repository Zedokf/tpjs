addEventListener('load', () => {

    /** Politique de confidentialité */ 
    localStorage.getItem("darkmode") === null ? localStorage.setItem("darkmode",document.body.style.backgroundColor) : localStorage.getItem("darkmode")
    localStorage.getItem("header") === null ? localStorage.setItem("header",document.getElementById("navbarNavDropdown").style.backgroundColor) : localStorage.getItem("header")
    const confidential = localStorage.getItem('confidential');
    const doneConfidential = document.getElementById('doneConfidential');
    const divConfidential = document.getElementById('confidential');


    if (confidential === "hidden") {
        hiddenConfidential()
    } else {
        localStorage.setItem('confidential', "notHidden");

    }

    doneConfidential.addEventListener('click', function () {
        localStorage.setItem('confidential', "hidden");
        hiddenConfidential()
    })

    function hiddenConfidential() {
        divConfidential.style.display = "none"
    }

    document.body.style.backgroundColor = localStorage.getItem("darkmode", parent.document.body.style.backgroundColor)
    headerMode(document.body.style.backgroundColor == "#000000" ? true:false)
})

function darkmode(){
    if (document.body.style.backgroundColor == '') { //si '' blanc
        document.body.style.backgroundColor = "#000000"
        document.querySelectorAll('div').forEach(function(e){ //mode sombre
            e.style.backgroundColor = "#000000"
            e.style.color="white"
        })
        document.body.style.color="white"
        headerMode(true)
    }else{
        document.body.style.backgroundColor = ''
        document.querySelectorAll('div').forEach(function(e){ //mode jour
            e.style.backgroundColor = 'whitesmoke'  
            e.style.color="#000000"
        })
        headerMode(false)
    }
    localStorage.setItem("darkmode", document.body.style.backgroundColor)
}

function headerMode(mode){
var elements = document.querySelectorAll('.bg-body-tertiary, .navbar-brand, .nav-link, #navbarNavDropdown, #search,#boutton,.container-fluid');

for (var i = 0; i < elements.length; i++) {
    if(mode)
        elements[i].style.backgroundColor = '#003c00';
    else
        elements[i].style.backgroundColor = 'green';

}

var searchInput = document.querySelector('.form-control');
searchInput.style.color = 'black';

}
