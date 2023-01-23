// function init(){
//     const parcThabor = {
//         lat: 48.114384,
//         lng: -1.669494
//     }

//     const zoomLevel = 7;

//     const map = L.map('mapid').setView([parcThabor.lat, parcThabor.lng], zoomLevel);

//     const mainLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         maxZoom: 19,
//         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
//     }).addTo(map);

//     mainLayer.addTo(map);

// }

function retrieve_data(){
    fetch("./lieux-de-tournage-a-paris.json")
    .then(function(response){
        return response.json();
    })

    .then(function(tournages){
        let placeholder = document.querySelector("#data-output");
        let out = "";

        for(let tournage of tournages){
            out += `
                <tr>
                    <td>${tournage.id_lieu}</td>
                    <td>${tournage.annee_tournage}</td>
                    <td>${tournage.type_tournage}</td>
                    <td>${tournage.nom_tournage}</td>
                    <td>${tournage.nom_realisateur}</td>
                    <td>${tournage.nom_producteur}</td>
                    <td>${tournage.adresse_lieu}</td>
                    <td>${tournage.ardt_lieu}</td>
                    <td>${tournage.date_debut}</td>
                    <td>${tournage.date_fin}</td>
                    <td>${tournage.coord_x}</td>
                    <td>${tournage.coord_y}</td>
                    <td>${tournage.geo_shape}</td>
                    <td>${tournage.geo_point_2d}</td>
                </tr>
            `;
        }

        placeholder.innerHTML = out;
    })
}

retrieve_data();
