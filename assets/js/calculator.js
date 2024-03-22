function calculate() {
  var model = document.getElementById("model").value;
  var processor = document.getElementById("processor").value;
  var ram = document.getElementById("ram").value;
  var storage = document.getElementById("storage").value;
  var period = parseInt(document.getElementById("period").value);
  var quantity = parseInt(document.getElementById("quantity").value);

  // Get the rental price of one unit of laptop
  var rentalPrice = getRentalPrice(model, processor, ram, storage, period);

  // Get the actual price of one unit of laptop
  var actualPrice = getActualPrice(model, processor, ram, storage, period);

  // Calculate the total rental value
  var rentalValue = rentalPrice * quantity * period;

  // Calculate the rental per month value
  var rentPerMonth = (rentalValue / period) / quantity;

  // Calculate the total buying value
  var totalBuyingAmount = actualPrice * quantity;

  // Calculate the total rental value
  var rentTotalPerMonth = rentalValue / period;

  // Calculate the difference between actual price and rental value
  var difference = actualPrice - rentalValue;

  // Display the results
  
  var resultDiv = document.getElementById("result");
  if(rentalPrice == "")
  {
    resultDiv.innerHTML = "<br>"+"Sorry, No rental available in this requirement"
  }
  else
  {
    resultDiv.innerHTML = "<br>"+"Get your hands on our top-tier laptops for just ₹" + rentPerMonth.toLocaleString() + "/month!<br>" +
      "Total Rental Amount: ₹" + rentPerMonth.toLocaleString() + " X " + quantity.toLocaleString() + " = ₹" + rentTotalPerMonth.toLocaleString() + " /month<br>" +
      "Total Rental Value:  ₹" + rentalValue.toLocaleString()  + " for " + period.toLocaleString() + " months <br>" +
      "Actual Price of one laptop: ₹" + actualPrice.toLocaleString() + "<br>" +
      "Toatal Price of buying thees "+ quantity.toLocaleString() +" laptop: ₹" + totalBuyingAmount.toLocaleString() + "<br>" +
      "Your are saved with renting ₹" + difference.toLocaleString();
  }

}

function getActualPrice(model, processor, ram, storage, period) {
  // Define the actual prices for each variant
  var prices = {

    // 6 months
    "HP Laptop_i5_8GB_256GB_12": 161400,
    "HP Laptop_i5_16GB_256GB_12": 162400,
    "HP Laptop_i7_16GB_512GB_12": 173000,
    "HP Laptop_i7_32GB_512GB_12": 178000,
    "Apple MacBook Pro_i7_16GB_512GB_12": 189000,
    // 12 months
    "HP Laptop_i5_8GB_256GB_6": 161400,
    "HP Laptop_i5_16GB_256GB_6": 162400,
    "HP Laptop_i7_16GB_512GB_6": 173000,
    "HP Laptop_i7_32GB_512GB_6": 178000,
    "Apple MacBook Pro_i7_16GB_512GB_6": 189000
    // Add more variants and prices as needed
  };

  // Generate the key for the prices object based on the selected model, ram, and storage
  var key = model + "_" + processor + "_" + ram + "_" + storage + "_" + period;

  // Return the actual price for the selected variant
  return prices[key] || 0; // Return 0 if variant not found
}


function getRentalPrice(model, processor, ram, storage, period) {
  // Define the actual prices for each variant
  var prices = {
    // 6 months
    "HP Laptop_i5_8GB_256GB_12": 2500,
    "HP Laptop_i5_16GB_256GB_12": 2800,
    "HP Laptop_i5_16GB_512GB_12": 3000,
    "HP Laptop_i7_16GB_512GB_12": 3300,
    "HP Laptop_i7_32GB_512GB_12": 3500,
    "Apple MacBook Pro_i7_16GB_512GB_12": 5000,
    // 12 months
    "HP Laptop_i5_8GB_256GB_6": 2700,
    "HP Laptop_i5_16GB_256GB_6": 3000,
    "HP Laptop_i5_16GB_512GB_6": 3500,
    "HP Laptop_i7_16GB_512GB_6": 3500,
    "HP Laptop_i7_32GB_512GB_6": 4000,
    "Apple MacBook Pro_i7_16GB_512GB_6": 5500
    // Add more variants and prices as needed
  };

  // Generate the key for the prices object based on the selected model, ram, and storage
  var key = model + "_" + processor + "_" + ram + "_" + storage + "_" + period;

  // Return the actual price for the selected variant
  return prices[key] || 0; // Return 0 if variant not found
}
