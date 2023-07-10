const autocompleteInput = new autocomplete.GeocoderAutocomplete(
    document.getElementById("autocomplete"), 
    '3082d9f8f08846a987a1c0a3ed4ecd05', 
    {  });
autocompleteInput.on('select', (location) => {
console.log(location)
const placeName = location.properties.address_line1;
const placeLocation = location.properties.address_line2;
const latitude = location.geometry.coordinates[1];
const longitude = location.geometry.coordinates[0];

// Set the selected location values to hidden inputs in the form
document.getElementById('address_1').value = placeName;
document.getElementById('address_2').value = placeLocation;
document.getElementById('latitude').value = latitude;
document.getElementById('longitude').value = longitude;
});