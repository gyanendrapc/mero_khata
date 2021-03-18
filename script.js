const addCustomerBtn = document.querySelector("#add-customer-btn");

const addCustomer = document.querySelector("#add-customer");
const viewCustomer = document.querySelector("#view-customer");
const editCustomer = document.querySelector("#edit-customer");
const deleteCustomer = document.querySelector("#delete-customer");

// add customer
addCustomerBtn.addEventListener("click", addCustomerFnx);
function addCustomerFnx() {
  if (addCustomer.style.display == "block") {
    addCustomer.style.display = "none";
  } else {
    addCustomer.style.display = "block";
  }
}

// edit customer
function showViewCustomer() {
  if (viewCustomer.style.display == "block") {
    viewCustomer.style.display = "none";
  } else {
    viewCustomer.style.display = "block";
  }
}
// edit customer
function showEditCustomer() {
  if (editCustomer.style.display == "block") {
    editCustomer.style.display = "none";
  } else {
    editCustomer.style.display = "block";
  }
}

// close fnx
function closeFnx() {
  addCustomer.style.display = "none";
  viewCustomer.style.display = "none";
  editCustomer.style.display = "none";
}
