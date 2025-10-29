document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("offcanvasContainer");
    const btn = document.getElementById("loadOffcanvasBtn");

    if (!container || !btn) return;

    btn.addEventListener("click", () => {
        fetch("/promo-discounts-partial") // route returning your Blade partial
            .then((res) => res.text())
            .then((html) => {
                container.innerHTML = html;

                const offcanvasElement =
                    document.getElementById("filterOffcanvas");
                if (!offcanvasElement) return;

                const bsOffcanvas = new bootstrap.Offcanvas(offcanvasElement);
                bsOffcanvas.show();
                //year fucntion
                initPriceFilter();
                initYearFilter();
                initMileageFilter();

                document.addEventListener("DOMContentLoaded", () => {
                    const input = document.getElementById("yourInputId");
                    input.addEventListener("click", () => {
                        bsOffcanvas.show();
                        initMileageFilter();
                    });
                });

                // COUNTRY DROPDOWN
                const dropdownItems = document.querySelectorAll(
                    "#tab-country .dropdown-item"
                );
                const dropdownBtn = document.querySelector(
                    "#tab-country #countryDropdown"
                );

                dropdownItems.forEach((item) => {
                    item.addEventListener("click", function (e) {
                        e.preventDefault();
                        const selectedText = this.textContent.trim();
                        const selectedImg = this.querySelector("img").src;

                        dropdownBtn.innerHTML = `<img src="${selectedImg}" width="20" class="me-2"> ${selectedText}`;
                    });
                });

                // Tab toggle logic
                const navLinks = document.querySelectorAll(
                    " #custom-tab-nav .nav-link"
                );
                const tabPanes = document.querySelectorAll(".tab-pane");
                const badgeBlocks = document.querySelectorAll(".badge-block");

                navLinks.forEach((link) => {
                    link.addEventListener("click", function (e) {
                        e.preventDefault();

                        // 1. Set active tab
                        navLinks.forEach((nav) =>
                            nav.classList.remove("active")
                        );
                        this.classList.add("active");

                        // 2. Hide all tab panes
                        tabPanes.forEach((pane) => {
                            pane.classList.add("d-none");
                            pane.classList.remove("active");
                        });

                        // 3. Show selected tab pane
                        const targetId = this.getAttribute("href");
                        const targetPane = document.querySelector(targetId);
                        if (targetPane) {
                            targetPane.classList.remove("d-none");
                            targetPane.classList.add("active");
                        }

                        // 4. Hide all badge blocks
                        // badgeBlocks.forEach((block) =>
                        //     block.classList.add("d-none")
                        // );

                        // 5. Show corresponding badge block
                        // const tabName = targetId.replace("#tab-", ""); // e.g., "fuel"
                        // const badgeToShow = document.getElementById(
                        //     "badge-" + tabName
                        // );
                        // if (badgeToShow) {
                        //     badgeToShow.classList.remove("d-none");
                        // }
                    });
                });
            });
    });
});
// FILLTER YEAR  CONTENT
function initYearFilter() {
    const minSlider = document.getElementById("yearMin");
    const maxSlider = document.getElementById("yearMax");
    const minInput = document.getElementById("minYear");
    const maxInput = document.getElementById("maxYear");
    const activeBar = document.getElementById("rangeActive");
    const yearButtons = document.querySelectorAll(".year-btn");

    if (!minSlider || !maxSlider || !minInput || !maxInput || !activeBar)
        return;

    //   function updateYearRange() {
    //     let minVal = parseInt(minSlider.value);
    //     let maxVal = parseInt(maxSlider.value);

    //     if (minVal > maxVal) [minVal, maxVal] = [maxVal, minVal];

    //     const rangeMin = parseInt(minSlider.min);
    //     const rangeMax = parseInt(minSlider.max);

    //     const percentMin = ((minVal - rangeMin) / (rangeMax - rangeMin)) * 100;
    //     const percentMax = ((maxVal - rangeMin) / (rangeMax - rangeMin)) * 100;
    //     const width = Math.max(percentMax - percentMin, 0.5);

    //     activeBar.style.left = `${percentMin}%`;
    //     activeBar.style.width = `calc(${width}% - 8px)`;

    //     minInput.value = minVal;
    //     maxInput.value = maxVal;
    //   }
    function updateYearRange() {
        let minVal = parseInt(minSlider.value);
        let maxVal = parseInt(maxSlider.value);

        if (minVal > maxVal) [minVal, maxVal] = [maxVal, minVal];

        const rangeMin = parseInt(minSlider.min);
        const rangeMax = parseInt(maxSlider.max);

        const percentMin = ((minVal - rangeMin) / (rangeMax - rangeMin)) * 100;
        const percentMax = ((maxVal - rangeMin) / (rangeMax - rangeMin)) * 100;
        const width = Math.max(percentMax - percentMin, 0.5);

        activeBar.style.left = `${percentMin}%`;
        activeBar.style.width = `calc(${width}% - 15px)`;

        minInput.value = minVal.toLocaleString();
        maxInput.value = maxVal.toLocaleString();
    }

    minSlider.addEventListener("input", updateYearRange);
    maxSlider.addEventListener("input", updateYearRange);

    yearButtons.forEach((button) => {
        button.addEventListener("click", () => {
            yearButtons.forEach((b) => b.classList.remove("active"));
            button.classList.add("active");

            const min = parseInt(button.dataset.min);
            const max = parseInt(button.dataset.max);

            if (!isNaN(min)) {
                minSlider.value = min;
                minInput.value = min;
                minSlider.dispatchEvent(new Event("input")); // ← here
            }

            if (!isNaN(max)) {
                maxSlider.value = max;
                maxInput.value = max;
                maxSlider.dispatchEvent(new Event("input")); // ← here
            }
            selectedFilterCount();
            // No need to call updateYearRange() here,
            // because input events will call it.
        });
    });

    // updateYearRange(); // run once to sync values
}

// FILLTER YEAR  CONTENT
// START FILLTER MILAGE  CONTENT

function initMileageFilter() {
    const minMileageSlider = document.getElementById("minMileageRange");
    const maxMileageSlider = document.getElementById("maxMileageRange");
    const minMileageInput = document.getElementById("minMileage");
    const maxMileageInput = document.getElementById("maxMileage");
    const mileageActive = document.getElementById("mileageActive");

    if (!minMileageSlider || !maxMileageSlider || !mileageActive) return;

    function updateMileageRange() {
        let minVal = parseInt(minMileageSlider.value);
        let maxVal = parseInt(maxMileageSlider.value);

        if (minVal > maxVal) [minVal, maxVal] = [maxVal, minVal];

        const rangeMin = parseInt(minMileageSlider.min);
        const rangeMax = parseInt(minMileageSlider.max);

        const percentMin = ((minVal - rangeMin) / (rangeMax - rangeMin)) * 100;
        const percentMax = ((maxVal - rangeMin) / (rangeMax - rangeMin)) * 100;
        const width = Math.max(percentMax - percentMin, 0.5);

        mileageActive.style.left = `${percentMin}%`;
        mileageActive.style.width = `calc(${width}% - 10px)`;

        minMileageInput.value = minVal.toLocaleString();
        maxMileageInput.value = maxVal.toLocaleString();
    }

    // Slider listeners
    minMileageSlider.addEventListener("input", updateMileageRange);
    maxMileageSlider.addEventListener("input", updateMileageRange);

    updateMileageRange(); // Initialize on load

    // Mileage button clicks
    const mileageButtons = document.querySelectorAll(".mileage-btn");
    mileageButtons.forEach((button) => {
        button.addEventListener("click", () => {
            // Deactivate all buttons first
            mileageButtons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");

            // Set max slider to value from button (data-value preferred)
            const value = parseInt(
                button.dataset.value || button.textContent.replace(/[^\d]/g, "")
            );
            if (!isNaN(value)) {
                maxMileageSlider.value = value;
                updateMileageRange();
                selectedFilterCount();
            }
        });
    });
}

// END FILLTER MILAGE  CONTENT

document.addEventListener("DOMContentLoaded", function () {
    const dropdownItems = document.querySelectorAll(
        "#tab-country .dropdown-item"
    );
    const dropdownBtn = document.querySelector("#tab-country #countryDropdown");

    dropdownItems.forEach((item) => {
        item.addEventListener("click", function (e) {
            e.preventDefault();

            const selectedText = this.textContent.trim();
            const selectedImg = this.querySelector("img").src;

            // Set the new content in the dropdown button
            dropdownBtn.innerHTML = `<img src="${selectedImg}" width="20" class="me-2"> ${selectedText}`;
        });
    });
});
// START FILLTER CAR PRICE  CONTENT

function initPriceFilter() {
    const minSlider = document.getElementById("minPriceRange");
    const maxSlider = document.getElementById("maxPriceRange");
    const minInput = document.getElementById("minPrice");
    const maxInput = document.getElementById("maxPrice");
    const activeBar = document.getElementById("priceActive");
    const priceButtons = document.querySelectorAll(".price-btn");

    function updatePriceRange() {
        let minVal = parseInt(minSlider.value);
        let maxVal = parseInt(maxSlider.value);

        if (minVal > maxVal) [minVal, maxVal] = [maxVal, minVal];

        minInput.value = minVal.toLocaleString();
        maxInput.value = maxVal.toLocaleString();

        const rangeMin = parseInt(minSlider.min);
        const rangeMax = parseInt(minSlider.max);
        const percentMin = ((minVal - rangeMin) / (rangeMax - rangeMin)) * 100;
        const percentMax = ((maxVal - rangeMin) / (rangeMax - rangeMin)) * 100;

        activeBar.style.left = percentMin + "%";
        activeBar.style.width = `calc(${percentMax - percentMin}% - 8px)`; // ← fix for overlap
    }

    // Input drag
    minSlider.addEventListener("input", updatePriceRange);
    maxSlider.addEventListener("input", updatePriceRange);

    // Button click to set price ranges
    priceButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            priceButtons.forEach((b) => b.classList.remove("active"));
            btn.classList.add("active");

            const min = parseInt(btn.dataset.min);
            const max = parseInt(btn.dataset.max);

            if (!isNaN(min)) {
                minSlider.value = min;
                minInput.value = min.toLocaleString();
            }

            if (!isNaN(max)) {
                maxSlider.value = max;
                maxInput.value = max.toLocaleString();
            }

            updatePriceRange();
            selectedFilterCount();
        });
    });

    updatePriceRange(); // Initialize on load
}

// END FILLTER CAR PRICE  CONTENT
// Initialize on page load
function updatePrice() {
    let qty = document.getElementById("qty")?.value || 0;
    let pricePerItem = 100; // adjust your value
    let total = qty * pricePerItem;

    let output = document.getElementById("totalPrice");
    if (output) output.innerText = "₹ " + total;
    selectedFilterCount();
}
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".mileage-slider").forEach(updatePrice);
});

function selectTransmission(clickedBtn) {
    const buttons = document.querySelectorAll(".transmission-btn");
    buttons.forEach((btn) => btn.classList.remove("active"));
    clickedBtn.classList.add("active");
    selectedFilterCount();
}

document.addEventListener("click", function (e) {
    if (e.target.closest(".body-type-card")) {
        const card = e.target.closest(".body-type-card");

        // remove selected from all
        document
            .querySelectorAll(".body-type-card")
            .forEach((c) => c.classList.remove("selected"));

        // add selected to current
        card.classList.add("selected");
        selectedFilterCount();
        // update hidden field
        document.getElementById("selected_body_type").value =
            card.getAttribute("data-id");

        // console.log("Card clicked:", card.getAttribute("data-id"));
    }
});

// Event delegation for fuel type selection
document.addEventListener("click", function (e) {
    if (e.target.closest(".fuel-type-btn")) {
        const btn = e.target.closest(".fuel-type-btn");

        // Remove selected from all buttons
        document
            .querySelectorAll(".fuel-type-btn")
            .forEach((b) => b.classList.remove("selected"));

        // Add selected class to clicked button
        btn.classList.add("selected");
        selectedFilterCount();
        // Update hidden field (for form submit)
        // document.getElementById("selected_fuel_type").value =
        //     btn.getAttribute("data-id");

        // console.log("Fuel type selected:", btn.getAttribute("data-id"));
    }
});

function toggleCheck(el) {
    document
        .querySelectorAll("#colorBoxGroup .color-container")
        .forEach((box) => {
            box.addEventListener("click", function () {
                // Remove selection from all
                document
                    .querySelectorAll("#colorBoxGroup .color-container")
                    .forEach((c) => c.classList.remove("selected"));

                // Add to this
                this.classList.add("selected");
                selectedFilterCount();
            });
        });
}
//Brand Bottom Container
const brandModels = {
    peugeot: ["2008", "3008"],
    bmw: ["All BMW Models"],

    ford: ["All Ford Models"],

    hyundai: ["All Hyundai Models"],
    isuzu: ["All Isuzu Models"],
    kia: ["All Kia Models"],
    lexus: ["All Lexus Models"],
    mazda: ["All Mazda Models"],
    mercedes: ["All Mercedes Models"],
    mini: ["All Mini Models"],
    mitsubishi: ["All Mitsubishi Models"],
    nissan: ["All Nissan Models"],
    naza: ["All Naza Models"],
    perodua: ["All Perodua Models"],
    subaru: ["All Subaru Models"],
    suzuki: ["All Suzuki Models"],

    volkswagen: ["All Volkswagen Models"],
    proton: [
        "All",
        "Ertiga",
        "Exora (2)",
        "Inspira (3)",
        "Iriz",
        "Perdana (10)",
        "Persona (4)",
        "Preve",
        "S70 (5)",
        "Saga (10)",
        "Suprima S",
        "X50 (2)",
        "X70 (3)",
        "X90 (4)",
    ],
    renault: ["Koleos", "Captur"],
    honda: ["City", "Civic", "Jazz", "HR-V", "Accord"],
    toyota: ["Vios", "Altis", "Yaris", "Camry", "Rush", "Hilux"],
};

let currentModelSection = null;

function selectBrand(brandId, element) {
    // Remove existing highlights
    document
        .querySelectorAll(".brand-item")
        .forEach((item) => item.classList.remove("active"));
    element.classList.add("active");
    selectedFilterCount();
    // Remove previous model section
    if (currentModelSection) currentModelSection.remove();

    // Clone template and insert
    const template = document.getElementById("model-template");
    const clone = template.content.cloneNode(true);
    const modelSection = clone.querySelector(".model-section");
    const modelWrapper = modelSection.querySelector(".model-buttons");
    currentModelSection = modelSection;
    $.ajax({
        url: "/list-model-category",
        type: "GET",
        data: {
            q: "",
            brand_id: brandId,
            salesCategory: document.getElementById("car_category")?.value || "",
        },
        success: function (response) {
            // Populate buttons
            const models = response || ["No models available"];
            models.forEach((model) => {
                const btn = document.createElement("button");
                btn.textContent = model.model_name;
                btn.className =
                    "btn btn-outline-secondary btn-sm model-button text-dark ";
                btn.dataset.id = model.id;
                const selected_models = ["Saga (10)"];
                if (selected_models.includes(model.model_name)) {
                    btn.classList.add("selected");
                }
                const disable_models = ["Ertiga", "Iriz", "Preve", "Suprima S"];
                if (disable_models.includes(model.model_name)) {
                    btn.disabled = true;
                }
                btn.onclick = () => selectModel(btn);
                modelWrapper.appendChild(btn);
            });
        },
        error: function (xhr) {
            console.error("Error:", xhr);
        },
    });

    // Find the .brand-row that contains the clicked brand
    let parentRow = element.closest(".brand-row");
    if (parentRow) parentRow.insertAdjacentElement("afterend", modelSection);
}

function selectModel(button) {
    document
        .querySelectorAll(".model-buttons button")
        .forEach((btn) => btn.classList.remove("selected"));
    button.classList.add("selected");
    selectedFilterCount();
}

function selectedFilterCount() {
    const listremove = [];
    // let country_id =
    //     document
    //         .querySelector("#tab-country #countryDropdown")
    //         ?.textContent.trim() || "";
    let brand_id =
        document.querySelector(".brand-item.active")?.dataset.id || "";
    if (document.querySelector(".brand-item.active")) {
        listremove.push({
            name: cleanName(
                document.querySelector(".brand-item.active")?.text.trim()
            ),
            removeclass: ".brand-item.active",
        });
    }
    let model_id =
        document
            .querySelector(".model-buttons button.selected")
            ?.dataset.id.trim() || "";
    if (document.querySelector(".model-buttons button.selected")) {
        listremove.push({
            name: document.querySelector(".model-buttons button.selected")
                ?.textContent,
            removeclass: ".model-buttons button.selected",
        });
    }
    let body_type_id =
        document.querySelector(".body-type-card.selected")?.dataset.id || "";
    if (document.querySelector(".body-type-card.selected")) {
        listremove.push({
            name: document
                .querySelector(".body-type-card.selected")
                ?.textContent.trim(),
            removeclass: ".body-type-card.selected",
        });
    }
    let fuel_type_id =
        document.querySelector(".fuel-type-btn.selected")?.dataset.id || "";
    if (document.querySelector(".fuel-type-btn.selected")) {
        listremove.push({
            name: document.querySelector(".fuel-type-btn.selected")
                ?.textContent,
            removeclass: ".fuel-type-btn.selected",
        });
    }
    let yearRange = [
        document.getElementById("minYear")?.value,
        document.getElementById("maxYear")?.value,
    ];
    if (
        document.getElementById("minYear") &&
        document.getElementById("maxYear")
    ) {
        if (document.getElementById("maxYear")?.value != "") {
            listremove.push({
                name:
                    document.getElementById("minYear")?.value +
                    "-" +
                    document.getElementById("maxYear")?.value,
                removeclass: "maxYear",
            });
        }
    }
    let priceRange = [
        document.getElementById("minPrice")?.value,
        document.getElementById("maxPrice")?.value,
    ];
    if (
        document.getElementById("minPrice") &&
        document.getElementById("maxPrice")
    ) {
        if (document.getElementById("maxPrice")?.value != "0") {
            listremove.push({
                name:
                    document.getElementById("minPrice")?.value +
                    "-" +
                    document.getElementById("maxPrice")?.value,
                removeclass: "maxPrice",
            });
        }
    }
    let mileageRange = [
        document.getElementById("minMileage")?.value,
        document.getElementById("maxMileage")?.value,
    ];
    if (
        document.getElementById("minMileage") &&
        document.getElementById("maxMileage")
    ) {
        if (document.getElementById("maxMileage")?.value != "0") {
            listremove.push({
                name:
                    document.getElementById("minMileage")?.value +
                    "-" +
                    document.getElementById("maxMileage")?.value,
                removeclass: "maxMileage",
            });
        }
    }
    let transmission =
        document.querySelector(".transmission-btn.active")?.dataset.id || "";
    if (document.querySelector(".transmission-btn.active")) {
        listremove.push({
            name: document.querySelector(".transmission-btn.active")
                ?.textContent,
            removeclass: ".transmission-btn.active",
        });
    }
    let color =
        document.querySelector(".color-container.selected")?.dataset.id || "";
    if (document.querySelector(".color-container.selected")) {
        listremove.push({
            name: cleanText(
                document.querySelector(".color-container.selected")?.textContent
            ),
            removeclass: ".color-container.selected",
        });
    }
    let centre = document.querySelector("#tab-centre button.selected")?.value;
    let selectedCentre = document.querySelector("#tab-centre button.selected");
    if (selectedCentre) {
        const centreId = selectedCentre.value; // the value attribute
        const centreName = selectedCentre.textContent.trim(); // button text
        console.log("Selected Centre ID:", centreId);
        console.log("Selected Centre Name:", centreName);
        listremove.push({
            name: centreName,
            removeclass: "#tab-centre button.selected",
        });
    }

    console.log(listremove);
    let data = {
        _token: document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        promotion_id: document.getElementById("promotion_id")?.value || "",
        promotion_category:
            document.getElementById("car_category")?.value || "",
        // country_id: "1",
        brand_id: brand_id || "null",
        model_id: model_id || "null",
        body_type_id: body_type_id || "null",
        fuel_type_id: fuel_type_id || "null",
        price: priceRange || [],
        year: yearRange || [],
        transmission: transmission || "null",
        mileage: mileageRange || [],
        color: color || "null",
        center: centre || "null",
    };
    selected_filters(listremove);

    $.ajax({
        url: "/promo-discounts-partial/filter-apply-count",
        type: "GET",
        data: data,
        success: function (response) {
            console.log("Saved successfully:", response);
            $("#filter-count").html("");
            $("#filter-count").append("(" + response.promoResult + ")");
        },
        error: function (xhr) {
            console.error("Error:", xhr.responseText);
            alert("Something went wrong!");
        },
    });
}
function selected_filters(listremove) {
    document.getElementById("selected-filters").innerHTML = "";
    listremove.forEach((e, i) => {
        const buton = document.createElement("span");
        buton.textContent = e.name;
        buton.className = "badge bg-light border text-dark py-2 col-3  me-1";
        buton.addEventListener("click", function () {
            removefilter(e);
        });
        document
            .getElementById("selected-filters")
            .insertAdjacentElement("afterbegin", buton);
    });
}
function removefilter(element) {
    document
        .querySelector(element.removeclass)
        ?.classList.remove("active", "selected");
    selectedFilterCount();
}
// function submitFilter() {
//     // Collect inputs/selections from offcanvas
//     console.log("GOT IT");
//     let country_id =
//         document
//             .querySelector("#tab-country #countryDropdown")
//             ?.textContent.trim() || "";
//     let brand_id =
//         document.querySelector(".brand-item.active")?.dataset.id || "";
//     let model_id =
//         document
//             .querySelector(".model-buttons button.selected")
//             ?.dataset.id.trim() || "";

//     let body_type_id =
//         document.querySelector(".body-type-card.selected")?.dataset.id.trim() ||
//         "";

//     let fuel_type_id =
//         document.querySelector(".fuel-type-btn.selected")?.dataset.id.trim() ||
//         "";

//     let yearRange = [
//         document.getElementById("minYear")?.value,
//         document.getElementById("maxYear")?.value,
//     ];

//     let priceRange = [
//         document.getElementById("minPrice")?.value,
//         document.getElementById("maxPrice")?.value,
//     ];

//     let mileageRange = [
//         document.getElementById("minMileage")?.value,
//         document.getElementById("maxMileage")?.value,
//     ];

//     let transmission =
//         document.querySelector(".transmission-btn.active")?.dataset.id || "";
//     let color =
//         document.querySelector(".color-container.selected")?.dataset.id || "";

//     // Build payload
//     let data = {
//         _token: document
//             .querySelector('meta[name="csrf-token"]')
//             .getAttribute("content"),
//         promotion_id: document.getElementById("promotion_id")?.value || "",
//         country_id: "1",
//         brand_id: brand_id || "null",
//         model_id: model_id || "null",
//         body_type_id: body_type_id || "null",
//         fuel_type_id: fuel_type_id || "null",
//         price: priceRange || [],
//         year: yearRange || [],
//         transmission: transmission || "null",
//         mileage: mileageRange || [],
//         color: color || "null",
//     };

//     console.log("Submitting payload:", data);

//     // AJAX POST
//     $.ajax({
//         url: "/promo-discounts-partial/filter-store",
//         type: "POST",
//         data: data,
//         success: function (response) {
//             console.log("Saved successfully:", response);
//               // 👇 Hide the offcanvas after successful response
//             let offcanvasElement = document.getElementById("offcanvasContainer");
//             let bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
//             if (bsOffcanvas) {
//                 bsOffcanvas.hide();
//             }
//         },
//         error: function (xhr) {
//             console.error("Error:", xhr.responseText);
//             alert("Something went wrong!");
//         },
//     });
// }
function submitFilter() {
    console.log("GOT IT");

    let country_id =
        document
            .querySelector("#tab-country #countryDropdown")
            ?.textContent.trim() || "";
    let brand_id =
        document.querySelector(".brand-item.active")?.dataset.id || "";
    let model_id =
        document
            .querySelector(".model-buttons button.selected")
            ?.dataset.id.trim() || "";
    let body_type_id =
        document.querySelector(".body-type-card.selected")?.dataset.id.trim() ||
        "";
    let fuel_type_id =
        document.querySelector(".fuel-type-btn.selected")?.dataset.id.trim() ||
        "";
    let yearRange = [
        document.getElementById("minYear")?.value,
        document.getElementById("maxYear")?.value,
    ];
    let priceRange = [
        document.getElementById("minPrice")?.value,
        document.getElementById("maxPrice")?.value,
    ];
    let mileageRange = [
        document.getElementById("minMileage")?.value,
        document.getElementById("maxMileage")?.value,
    ];
    let transmission =
        document.querySelector(".transmission-btn.active")?.dataset.id || "";
    let color =
        document.querySelector(".color-container.selected")?.dataset.id || "";
    let center = document.querySelector("#tab-centre button.selected")?.value;

    let data = {
        _token: document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        promotion_id: document.getElementById("promotion_id")?.value || "",
        country_id: "1",
        brand_id: brand_id || "null",
        model_id: model_id || "null",
        body_type_id: body_type_id || "null",
        fuel_type_id: fuel_type_id || "null",
        price: priceRange || [],
        year: yearRange || [],
        transmission: transmission || "null",
        mileage: mileageRange || [],
        color: color || "null",
        center: center || "null",
    };

    console.log("Submitting payload:", data);

    $.ajax({
        url: "/promo-discounts-partial/filter-store",
        type: "POST",
        data: data,
        success: function (response) {
            console.log("Saved successfully:", response);

            // Correctly close the offcanvas
            let offcanvasElement = document.getElementById("filterOffcanvas");
            let bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
            if (bsOffcanvas) {
                bsOffcanvas.hide();
            }
        },
        error: function (xhr) {
            console.error("Error:", xhr.responseText);
            alert("Something went wrong!");
            // Correctly close the offcanvas
            let offcanvasElement = document.getElementById("filterOffcanvas");
            let bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
            if (bsOffcanvas) {
                bsOffcanvas.hide();
            }
        },
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const badgeContainer = document.getElementById("selected-filters");
    if (!badgeContainer) return;

    // Helper function to handle toggle badges
    function handleItemClick(type, item, name) {
        const id = item.dataset.id || name;
        item.classList.toggle("selected");
        toggleBadge(badgeContainer, type, id, name);
    }

    // Universal mapping for tabs
    const filterMappings = [
        {
            containerSelector: "#tab-fuel",
            itemSelector: ".fuel-type-btn",
            type: "fuel",
            nameSelector: null,
        },
        {
            containerSelector: "#tab-body",
            itemSelector: ".body-type-card",
            type: "body",
            nameSelector: ".body-type-label",
        },
        {
            containerSelector: "#tab-transmission",
            itemSelector: ".transmission-btn",
            type: "transmission",
            nameSelector: null,
        },
        {
            containerSelector: "#tab-color",
            itemSelector: ".color-container",
            type: "color",
            nameSelector: ".color-label",
        },
        {
            containerSelector: "#tab-brand",
            itemSelector: ".brand-item",
            type: "brand",
            nameSelector: null,
        },
        {
            containerSelector: "#tab-price",
            itemSelector: ".price-btn",
            type: "price",
            nameSelector: null,
        },
        {
            containerSelector: "#tab-year",
            itemSelector: ".year-btn",
            type: "year",
            nameSelector: null,
        },
        {
            containerSelector: "#tab-mileage",
            itemSelector: ".mileage-btn",
            type: "mileage",
            nameSelector: null,
        },
    ];

    filterMappings.forEach(
        ({ containerSelector, itemSelector, type, nameSelector }) => {
            const container = document.querySelector(containerSelector);
            if (!container) return;

            // Event delegation: attach listener to container, handle clicks on items
            container.addEventListener("click", function (e) {
                const item = e.target.closest(itemSelector);
                if (!item || !container.contains(item)) return;

                let name = nameSelector
                    ? item.querySelector(nameSelector).textContent
                    : item.textContent.trim();
                handleItemClick(type, item, name);
            });
        }
    );
});

function cleanName(str) {
    return str.replace(/\(\d+\)/, "").trim();
}

function cleanText(input) {
    return input
        .replace(/[\n\r\t]+/g, " ") // remove newlines/tabs
        .replace(/[^a-zA-Z0-9\s]/g, "") // remove special chars like ✓
        .replace(/\s+/g, " ") // collapse multiple spaces
        .trim(); // remove leading/trailing spaces
}

document.addEventListener("click", function (e) {
    const button = e.target.closest("#tab-centre button");
    if (!button) return;

    // Remove 'selected' from all buttons
    document
        .querySelectorAll("#tab-centre button")
        .forEach((btn) => btn.classList.remove("selected"));

    // Add 'selected' to clicked button
    button.classList.add("selected");
});
