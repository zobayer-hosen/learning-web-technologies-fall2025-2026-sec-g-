const inputField = document.getElementById("mainInput");
const dropdown = document.getElementById("type");

dropdown.addEventListener("change", function () {
    inputField.value = this.value;  
});

const addBtn = document.getElementById("addbutton");
const outputArea = document.getElementById("outputArea");

addBtn.addEventListener("click", function () {
    const selectedType = dropdown.value;

    if (selectedType === "radio") {
        const g = ["Male", "Female"];
        let i;
        for ( i = 0; i < g.length; i++) {
            const radio = document.createElement("input");
            radio.type = "radio";
            radio.name = "gender";
            radio.value = g[i];
            radio.classList.add("dynamic");

            const label = document.createElement("label");
            label.textContent = g[i];

            outputArea.appendChild(radio);
            outputArea.appendChild(label);
        }
        outputArea.appendChild(document.createElement("br"));
    } else {
        const input = document.createElement("input");
        input.type = selectedType;
        input.placeholder = selectedType;
        input.classList.add("dynamic");
        input.style.display = "block";
        input.style.marginBottom = "10px";

        outputArea.appendChild(input);
    }
});


const submitbutton = document.getElementById("submit");
const output = document.getElementById("outputsubmition");

submitbutton.addEventListener("click", function () {

    const inputs = document.querySelectorAll("#outputArea .dynamic");

    output.innerHTML = "";
    let j;

  for (j = 0; j < inputs.length; j++) {
                if (inputs[j].type === "radio") {
            if (inputs[j].checked) {
                output.innerHTML += inputs[j].value + "<br>";
            }
        } else {
            output.innerHTML += inputs[j].value + "<br>";
        }
    }

});
