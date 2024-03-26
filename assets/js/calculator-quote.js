function calculate() {
  var model = document.getElementById("model").value;
  var period = parseInt(document.getElementById("period").value);
  var quantity = parseInt(document.getElementById("quantity").value);

  // Get the rental price of one unit of laptop
  var rentalPrice = getRentalPrice(model, period);

  // Get the actual price of one unit of laptop
  var actualPrice = getActualPrice(model, period);

  // Calculate the total rental value
  var rentalValue = rentalPrice * quantity * period;

  // Calculate the rental per month value
  var rentPerMonth = (rentalValue / period) / quantity;

  // Calculate the total buying value
  var totalBuyingAmount = actualPrice * quantity;

  // Calculate the total rental value
  var rentTotalPerMonth = rentalValue / period;

  // Calculate the difference between actual price and rental value
  var difference = totalBuyingAmount - rentalValue;

  // Display the results
  
  var resultDiv = document.getElementById("result");
  if(rentalPrice == "")
  {
    resultDiv.innerHTML = "<br>"+"<h4>Sorry, No rental available in this requirement</h4>"
  }
  else
  {
    resultDiv.innerHTML = "<br>"+"<h5>Congratulations on your choice!</h5> <br>Rent our top-tier laptops starting at just <b>₹" + rentPerMonth.toLocaleString() + "</b>/month!<br><br>" +
      "<h4>Want to know the value you're getting? Let's break it down:</h4>" + "<br>" +
      "&#128972; Total Rental Amount: Just <b>₹" + rentPerMonth.toLocaleString() + " X " + quantity.toLocaleString() + " = ₹" + rentTotalPerMonth.toLocaleString() + "</b>/month! That's affordability at its finest!<br>" +
      "&#128972; Total Rental Value: Rent for <b>" + period.toLocaleString() + "</b> months and pay only <b>"+rentalValue.toLocaleString()  + "!</b> Now that's what we call smart spending!<br><br><h4>Now, let's talk about the actual price: </h4><br>" +
      "Actual Price of one professional laptop: <b>₹" + actualPrice.toLocaleString() + "</b>. <br><br><b>But why buy when you can rent and save?</b><br><br><h4>Here's where renting really shines:</h4><br>" +
      "&#128972; Total Price of buying thees "+ quantity.toLocaleString() +" laptops: A whopping <b>₹" + totalBuyingAmount.toLocaleString() + "!</b> But with renting, you're saving <b>" +
      difference.toLocaleString()+ "!</b> Now that's a deal you can't resist! <br><br><h4>So why wait? Rent now and experience the power of top-tier laptops without breaking the bank! Happy renting! </h4>";
  }

}

function getActualPrice(model, period) {
  // Define the actual prices for each variant
  var prices = {

    // 6 months
    "Core i5_8GB256GB_6": 83500,
    "Core i5_16GB512GB_6": 93000,
    "Core i7_8GB256GB_6": 85400,
    "Core i7_16GB512GB_6": 94500,
    "Core i7_32GB512GB_6": 123000,
    "MacBook i7_16GB512GB_6": 226000,
    // 12 months
    "Core i5_8GB256GB_12": 83500,
    "Core i5_16GB512GB_12": 93000,
    "Core i7_8GB256GB_12": 85400,
    "Core i7_16GB512GB_12": 94500,
    "Core i7_32GB512GB_12": 123000,
    "MacBook i7_16GB512GB_12": 226000,
    // Add more variants and prices as needed
  };

  // Generate the key for the prices object based on the selected model, ram, and storage
  var key = model + "_" + period;

  // Return the actual price for the selected variant
  return prices[key] || 0; // Return 0 if variant not found
}


function getRentalPrice(model, period) {
  // Define the actual prices for each variant
  var prices = {
    // 12 months
    "Core i5_8GB256GB_12": 2500,
    "Core i5_16GB512GB_12": 3000,
    "Core i7_8GB256GB_12": 3300,
    "Core i7_16GB512GB_12": 3500,
    "Core i7_32GB512GB_12": 3700,
    "MacBook i7_16GB512GB_12": 5000,
    // 6 months
    "Core i5_8GB256GB_6": 2700,
    "Core i5_16GB512GB_6": 3200,
    "Core i7_8GB256GB_6": 3500,
    "Core i7_16GB512GB_6": 3800,
    "Core i7_32GB512GB_6": 4000,
    "MacBook i7_16GB512GB_6": 5500,
    // Add more variants and prices as needed
  };

  // Generate the key for the prices object based on the selected model, ram, and storage
  var key = model + "_" + period;

  // Return the actual price for the selected variant
  return prices[key] || 0; // Return 0 if variant not found
}
