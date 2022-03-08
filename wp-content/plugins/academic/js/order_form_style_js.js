
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "PAY NOW";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
	document.getElementById('first_name_display').innerHTML =document.getElementById("topic").value; 
	document.getElementById('last_name_display').innerHTML =document.getElementById("topic").value; 
	document.getElementById('email_display').innerHTML =document.getElementById("topic").value; 
	document.getElementById('country_display').innerHTML =document.getElementById("topic").value; 
	document.getElementById('phone_display').innerHTML =document.getElementById("topic").value; 
	document.getElementById('subject_display').innerHTML =document.getElementById("subject").value; 
	document.getElementById('topic_display').innerHTML =document.getElementById("topic").value; 
	document.getElementById('style_display').innerHTML =document.getElementById("reference_style").value; 
	document.getElementById('deadline_display').innerHTML =document.getElementById("urgency").value; 
	document.getElementById('level_display').innerHTML =document.getElementById("academic_level").value; 
	document.getElementById('numpages_display').innerHTML =document.getElementById("itemQty").value; 
	document.getElementById('space_display').innerHTML =document.getElementById("spacing").value; 
	document.getElementById('instructions_display').innerHTML =document.getElementById("description").value; 
	document.getElementById('onepage_display').innerHTML =document.getElementById("onepage").value;
    document.getElementById('plagiarism_display').innerHTML =document.getElementById("topic").value; 
    document.getElementById('sources_display').innerHTML =document.getElementById("references").value; 
    document.getElementById('total_display').innerHTML =document.getElementById("total").value; 	
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


