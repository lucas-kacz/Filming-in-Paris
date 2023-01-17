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