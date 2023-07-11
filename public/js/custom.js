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
    
    // if (document.getElementById('autocomplete') || document.getElementById('autocomplete_1')) {
    //   const autocompleteInput = new autocomplete.GeocoderAutocomplete(
    //                             document.getElementById("autocomplete"), 
    //                             '3082d9f8f08846a987a1c0a3ed4ecd05', 
    //                             {  });
    //     autocompleteInput.on('select', (location) => {
    //     const placeName = location.properties.address_line1;
    //     const placeLocation = location.properties.address_line2;
    //     const latitude = location.properties.lat;
    //     const longitude = location.properties.lon;

    //     if (!placeName || !placeLocation || !latitude || !longitude) {
    //         alert("Invalid address. Please select a valid address.");
    //         return;
    //     }

    //     // Set the selected location values to hidden inputs in the form
    //     document.getElementById('address_1').value = placeName;
    //     document.getElementById('address_2').value = placeLocation;
    //     document.getElementById('latitude').value = latitude;
    //     document.getElementById('longitude').value = longitude;
    //     });
    // }
    // const inputs = document.getElementsByClassName("autocomplete-container");

    // Array.from(inputs).forEach((input) => {
    //   const autocompleteInput = new autocomplete.GeocoderAutocomplete(input, '3082d9f8f08846a987a1c0a3ed4ecd05');

    //   autocompleteInput.on('select', (location) => {
    //         const placeName = location.properties.address_line1;
    //         const placeLocation = location.properties.address_line2;
    //         const latitude = location.properties.lat;
    //         const longitude = location.properties.lon;
    
    //         if (!placeName || !placeLocation || !latitude || !longitude) {
    //             alert("Invalid address. Please select a valid address.");
    //             return;
    //         }
    
    //         // Set the selected location values to hidden inputs in the form
    //         document.getElementById('address_1').value = placeName;
    //         document.getElementById('address_2').value = placeLocation;
    //         document.getElementById('latitude').value = latitude;
    //         document.getElementById('longitude').value = longitude;
    //         });
    // });

    function initializeAutocomplete(input) {
      const autocompleteInput = new autocomplete.GeocoderAutocomplete(input, '3082d9f8f08846a987a1c0a3ed4ecd05');
    
      autocompleteInput.on('select', (location) => {
        const placeName = location.properties.address_line1;
        const placeLocation = location.properties.address_line2;
        const latitude = location.properties.lat;
        const longitude = location.properties.lon;
    
        if (!placeName || !placeLocation || !latitude || !longitude) {
          alert("Invalid address. Please select a valid address.");
          return;
        }
        // console.log(input.parentNode.querySelector('#address_2').id, placeName)
        // Set the selected location values to hidden inputs in the form
        input.parentNode.querySelector('#address_1').value = placeName;
        input.parentNode.querySelector('#address_2').value = placeLocation;
        input.parentNode.querySelector('#latitude').value = latitude;
        input.parentNode.querySelector('#longitude').value = longitude;
      });
    }
    
    const inputs = document.getElementsByClassName("autocomplete-container");
    
    Array.from(inputs).forEach((input) => {
      initializeAutocomplete(input);
    });
    

    // calculate the price

    // Get the input elements
    if (document.getElementById('quantity') ){
      const quantityInput = document.getElementById('quantity');
      const weightInput = document.getElementById('weight');
      const individualPriceInput = document.getElementById('individual_price');
      const priceBeforeDiscountInput = document.getElementById('price-before-discount');
      const discountInput = document.getElementById('discount');
      const priceAfterDiscountInput = document.getElementById('price-after-discount');

      // Add event listeners to the input fields
      quantityInput.addEventListener('input', calculatePrice);
      weightInput.addEventListener('input', calculatePrice);
      individualPriceInput.addEventListener('input', calculatePrice);
      discountInput.addEventListener('input', calculatePrice);

      // Function to calculate the price
      function calculatePrice() {
        const quantity = parseFloat(quantityInput.value);
        const weight = parseFloat(weightInput.value);
        const individualPrice = parseFloat(individualPriceInput.value);
        const discount = parseFloat(discountInput.value);

        // Calculate the price before discount
        const priceBeforeDiscount = quantity * weight * individualPrice;
        if (isNaN(priceBeforeDiscount)) {
          priceAfterDiscount = 0; 
        }
        priceBeforeDiscountInput.value = priceBeforeDiscount.toFixed(2);

        // Calculate the price after discount
        const priceAfterDiscount = priceBeforeDiscount - discount;
        if (isNaN(priceAfterDiscount)) {
          priceAfterDiscount = 0;
        }
        priceAfterDiscountInput.value = priceAfterDiscount.toFixed(2);
      }

      // Initialize the initial calculation
      calculatePrice();
    };


  });
  