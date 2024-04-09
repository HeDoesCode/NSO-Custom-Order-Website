/* ====== start of multistep form functions ====== */
function nextStep(step) {
    if (step == 3) {
        // for the last step
        let barangay = brgySelect.options[brgySelect.selectedIndex].textContent;
        let municipality =
            cityMunSelect.options[cityMunSelect.selectedIndex].textContent;
        let province = provSelect.options[provSelect.selectedIndex].textContent;
        let region = regSelect.options[regSelect.selectedIndex].textContent;

        deliveryAddressInput.value = `${addressLine1Input.value}, ${barangay}, ${municipality}, ${province}, ${region}, ${postalCodeInput.value}`;

        setReview();
    }
    document.getElementById("step" + step).style.display = "none";
    document.getElementById("step" + (step + 1)).style.display = "block";
}

function prevStep(step) {
    document.getElementById("step" + step).style.display = "none";
    document.getElementById("step" + (step - 1)).style.display = "block";
}

/* ====== end of multistep form functions ====== */

/* ====== start of dynamic address input functions functions ====== */
const deliveryAddressInput = document.getElementById("deliveryAddress");
const addressLine1Input = document.getElementById("addressLine1");
const regSelect = document.getElementById("region");
const provSelect = document.getElementById("province");
const cityMunSelect = document.getElementById("cityMun");
const brgySelect = document.getElementById("brgy");
const postalCodeInput = document.getElementById("postalCode");
const xml = new XMLHttpRequest();
var optValue = "";

function clearOptions(el) {
    for (i = el.options.length - 1; i >= 0; i--) {
        el.remove(i);
    }

    var opt = document.createElement("option");
    opt.textContent = "--EMPTY";
    opt.value = "";
    el.appendChild(opt);
}

function initialLoad() {
    xml.open("GET", "/region");
    xml.onload = function () {
        if (xml.status == 200) {
            var regions = JSON.parse(xml.responseText);

            for (var i in regions) {
                var el = document.createElement("option");
                el.textContent =
                    regions[i].region_name +
                    " " +
                    regions[i].region_description;
                el.value = regions[i].region_id;
                regSelect.appendChild(el);
            }
        }
    };
    xml.send();
}

function loadProvinces() {
    clearOptions(provSelect);
    clearOptions(cityMunSelect);
    clearOptions(brgySelect);

    optValue = regSelect.options[regSelect.selectedIndex].value;

    xml.open("GET", "/province/" + optValue);
    xml.onload = function () {
        if (xml.status == 200) {
            var provinces = JSON.parse(xml.responseText);

            for (var i in provinces) {
                var el = document.createElement("option");
                el.textContent = provinces[i].province_name;
                el.value = provinces[i].province_id;
                provSelect.appendChild(el);
            }
        }
    };
    xml.send();
    xml.cl;
}

function loadCityMun() {
    clearOptions(cityMunSelect);
    clearOptions(brgySelect);

    optValue = provSelect.options[provSelect.selectedIndex].value;

    xml.open("GET", "/citymun/" + optValue);
    xml.onload = function () {
        if (xml.status == 200) {
            var municipalities = JSON.parse(xml.responseText);

            for (var i in municipalities) {
                var el = document.createElement("option");
                el.textContent = municipalities[i].municipality_name;
                el.value = municipalities[i].municipality_id;
                cityMunSelect.appendChild(el);
            }
        }
    };
    xml.send();
}

function loadBrgy() {
    clearOptions(brgySelect);

    optValue = cityMunSelect.options[cityMunSelect.selectedIndex].value;

    xml.open("GET", "/brgy/" + optValue);
    xml.onload = function () {
        if (xml.status == 200) {
            var barangays = JSON.parse(xml.responseText);

            for (var i in barangays) {
                var el = document.createElement("option");
                el.textContent = barangays[i].barangay_name;
                el.value = barangays[i].barangay_id;
                brgySelect.appendChild(el);
            }
        }
    };
    xml.send();
}

// eventlisteners
window.addEventListener("load", initialLoad);
regSelect.addEventListener("change", loadProvinces);
provSelect.addEventListener("change", loadCityMun);
cityMunSelect.addEventListener("change", loadBrgy);

/* ====== end of dynamic address input functions functions ====== */

/* ====== start of review inputs function ====== */
function setReview() {
    // create error element placeholder
    const errorEl = document.createElement("span");
    errorEl.textContent = "EMPTY!";
    errorEl.style.color = "red";

    // get form values
    let username = document.getElementById("username").value;
    let email = document.getElementById("email").value;
    let fname = document.getElementById("firstName").value;
    let lname = document.getElementById("lastName").value;
    let contact = document.getElementById("contact").value;
    let address = document.getElementById("deliveryAddress").value;

    // get review tags
    const reviewUsername = document.getElementById("review-username");
    const reviewEmail = document.getElementById("review-email");
    const reviewFname = document.getElementById("review-fname");
    const reviewLname = document.getElementById("review-lname");
    const reviewContact = document.getElementById("review-contact");
    const reviewAddress = document.getElementById("review-address");

    // set review texts
    reviewUsername.innerHTML = username != "" ? username : "--EMPTY--";
    reviewEmail.innerHTML = email != "" ? email : "--EMPTY--";
    reviewFname.innerHTML = fname != "" ? fname : "--EMPTY--";
    reviewLname.innerHTML = lname != "" ? lname : "--EMPTY--";
    reviewContact.innerHTML = contact != "" ? contact : "--EMPTY--";
    reviewAddress.innerHTML = address != "" ? address : "--EMPTY--";
}

/* ====== end of review inputs function ====== */

function checkTermsService() {
    const terms_service = document.getElementById("terms_service");
    const btn_register = document.getElementById("btn-register");

    if (terms_service.checked) {
        btn_register.removeAttribute("disabled");
    } else {
        btn_register.setAttribute("disabled", "");
    }
}

var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the link, open the modal
document
    .getElementById("terms_condition")
    .addEventListener("click", function (event) {
        event.preventDefault(); // Prevent default behavior of anchor tag
        modal.style.display = "block";
    });

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

function validateContact() {
    var contactInput = document.getElementById("contact");
    var contactValue = contactInput.value;

    if (!contactValue.match(/^09\d{9}$/)) {
        alert('Contact number must start with "09" and have 11 digits.');
        return false;
    }

    return true;
}
