function validateForm() {
    var name = document.getElementById('name').value;
    var weight = document.getElementById('weight').value;
    var height = document.getElementById('height').value;

    if (name === "", weigth ==="" ,height === "") {
        alert("جميع الحقول مطلوبة.");
        return false;
    }

    if (isNaN(weight) || isNaN(height)) {
        alert("يجب أن يكون الوزن والطول أرقامًا.");
        return false;
    }

    return true;
}