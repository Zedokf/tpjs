addEventListener('load', () => {

    /** Politique de confidentialité */
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

    /** DarkMode */
    // document.body.style.backgroundColor = localStorage.getItem("darkmode", document.body.style.backgroundColor)
    // const mode = document.getElementById("mode");
    // mode.addEventListener('click', () => {
    //     if (document.body.style.backgroundColor == '') {
    //         document.body.style.backgroundColor = "#000000"
    //     } else {
    //         document.body.style.backgroundColor = ''
    //     }
    //     localStorage.setItem("darkmode", document.body.style.backgroundColor)
    // })


})
