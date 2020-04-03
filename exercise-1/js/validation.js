function validateForm() {
    let area = document.getElementById("input_area").value;
    let radius = document.getElementById("input_radius").value;
    if (area != "" && radius != ""){
        alert("Both values were set! Only one parameter can be defined!");
        return false;
    }

    return true;
}