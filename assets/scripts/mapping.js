//initialisation de la map
const map = L.map('mymap');
const osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const osmAttrib = 'Map data © OpenStreetMap contributors';
const osm = new L.tileLayer(osmUrl, {attribution: osmAttrib});
const clusters = L.markerClusterGroup();
map.setView([47.7, 1.7], 8);
map.addLayer(osm);

var departement = new L.GeoJSON.AJAX(["https://raw.githubusercontent.com/gregoiredavid/france-geojson/master/regions/centre-val-de-loire/departements-centre-val-de-loire.geojson"], {
    style: function (feature) {
      switch (feature.properties.code) {
        // case '37':
        //     return { color: "#c8d9ea" };
        // case '41':
        //     return { color: "#629ed5" };
        // case '36':
        //     return { color: "#629ed5"}

        default:
          return { color: "#629ed5" };
      }
    }
  }).addTo(map);


//Récupération des nom des villes et insertion dans l'url de l'API
const localisation = document.querySelectorAll('[data-location]');
for( let i=0; i<localisation.length; i++){
    let local = localisation[i].dataset.location
    const api = "https://geo.api.gouv.fr/communes?nom="+local+"&fields=centre&codeRegion=24"
    requeteCity(api)
}

//Requete API
function requeteCity(api){
    const request = new XMLHttpRequest();
    request.open('GET',api,true)
    request.addEventListener("readystatechange", () => {
        if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
            const data = JSON.parse(request.responseText);
            let nom = data[0].nom;     
            let longitude = data[0].centre.coordinates[0];
            let latitude = data[0].centre.coordinates[1];
            coordonne(nom, longitude, latitude);
            
        }
    });
    request.send()
    //Envois des coordonnées & noms vers la map pour creer un pin
    function coordonne(ville, long, lat){
        let mark = clusters.addLayer(L.marker([lat, long]));
        mark.addTo(map);
        mark.bindPopup(ville);
        map.addLayer(clusters)
    }
}