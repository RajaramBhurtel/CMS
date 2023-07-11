document.addEventListener('DOMContentLoaded', function() {
    // Auto set the date field

    if (document.getElementById('date')) {
      // Get the current date
      const currentDate = new Date();
  
      // Format the date as YYYY-MM-DD
      const year = currentDate.getFullYear();
      const month = String(currentDate.getMonth() + 1).padStart(2, '0');
      const day = String(currentDate.getDate()).padStart(2, '0');
      const formattedDate = `${year}-${month}-${day}`;
  
      // Set the value of the input element to the formatted date
      document.getElementById('date').value = formattedDate;
    }

    // Auto complete the location using geopapify
    
    if (document.getElementById('autocomplete')) {
      const autocompleteInput = new autocomplete.GeocoderAutocomplete(
                                document.getElementById("autocomplete"), 
                                '3082d9f8f08846a987a1c0a3ed4ecd05', 
                                {  });
        autocompleteInput.on('select', (location) => {
        const placeName = location.properties.address_line1;
        const placeLocation = location.properties.address_line2;
        const latitude = location.properties.lat;
        const longitude = location.properties.lon;

        if (!placeName || !placeLocation || !latitude || !longitude) {
            alert("Invalid address. Please select a valid address.");
            return;
        }

        // Set the selected location values to hidden inputs in the form
        document.getElementById('address_1').value = placeName;
        document.getElementById('address_2').value = placeLocation;
        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;
        });
    }


  });
  