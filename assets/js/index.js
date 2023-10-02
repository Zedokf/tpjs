addEventListener('load', () => {

    /** Politique de confidentialité */
    const confidential = localStorage.getItem('confidential');
    const doneConfidential = document.getElementById('doneConfidential');
    const divConfidential = document.getElementById('confidential');
    function hiddenConfidential() {
        divConfidential.classList.add('hidden');
    }
    if (confidential) {
        hiddenConfidential()
    } else {
        localStorage.setItem('confidential', false)
    }

    doneConfidential.addEventListener('click', function () {
        localStorage.setItem('confidential', true);
        hiddenConfidential()
    })

    /** DarkMode */
    document.body.style.backgroundColor = localStorage.getItem("darkmode", document.body.style.backgroundColor)
    const mode = document.getElementById("buttonDarkMode");
    mode.addEventListener('click', () => {
        if (document.body.style.backgroundColor == '') {
            document.body.style.backgroundColor = "#000000"
        } else {
            document.body.style.backgroundColor = ''
        }
        localStorage.setItem("darkmode", document.body.style.backgroundColor)
    })


    /** affichage produit */
    const productList = document.getElementById("productList")
    fetch('./db.json')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(product => {
                let element = document.createElement("li")
                let p1 = document.createElement("p")
                let p2 = document.createElement("p")
                let p3 = document.createElement("p")
                let p4 = document.createElement("p")

                p1.textContent = product.nom + ' - ' + product.prix + '€'
                p2.textContent = product.description
                // p3.textContent = product.prix
                p4.textContent = product.quantite
                element.appendChild(p1)
                element.appendChild(p2)
                element.appendChild(p3)
                element.appendChild(p4)
                productList.appendChild(element)
            })
        })

    /** Google map */
    let map;

    async function initMap() {
        // The location of Uluru
        const position = { lat: -25.344, lng: 131.031 };
        // Request needed libraries.
        //@ts-ignore
        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

        // The map, centered at Uluru
        map = new Map(document.getElementById("map"), {
            zoom: 4,
            center: position,
            mapId: "DEMO_MAP_ID",
        });

        // The marker, positioned at Uluru
        const marker = new AdvancedMarkerView({
            map: map,
            position: position,
            title: "Uluru",
        });
    }

    initMap();
})
