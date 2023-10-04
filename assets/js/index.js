addEventListener('load', () => {

    /** Politique de confidentialité */ 
    localStorage.getItem("darkmode") === null ? localStorage.setItem("darkmode",document.body.style.backgroundColor) : localStorage.getItem("darkmode")
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
})

function darkmode(){
    if (document.body.style.backgroundColor == '') {
        document.body.style.backgroundColor = "#000000"
    } else {
        document.body.style.backgroundColor = ''
    }
    localStorage.setItem("mode", document.body.style.backgroundColor)
}
