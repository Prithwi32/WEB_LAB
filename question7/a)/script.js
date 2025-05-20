window.onload = function () {
    document.getElementById("input1").value = "";
    document.getElementById("input2").value = "";
};

function getInputs() {
    return [
        parseFloat(document.getElementById("input1").value),
        parseFloat(document.getElementById("input2").value)
    ];
}

function add() {
    const [n1, n2] = getInputs();
    document.getElementById("result").innerText = "Result: " + (n1 + n2);
}

function sub() {
    const [n1, n2] = getInputs();
    document.getElementById("result").innerText = "Result: " + (n1 - n2);
}

function mul() {
    const [n1, n2] = getInputs();
    document.getElementById("result").innerText = "Result: " + (n1 * n2);
}

function div() {
    const [n1, n2] = getInputs();
    if (n2 === 0) {
        alert("Cannot divide by zero");
        clearValues();
        return;
    }
    document.getElementById("result").innerText = "Result: " + (n1 / n2);
}

function clearValues() {
    document.getElementById("input1").value = "";
    document.getElementById("input2").value = "";
    document.getElementById("result").innerText = "";
    alert("Cleared all values");
}

function AC() {
    document.getElementById("input1").value = "";
    document.getElementById("input2").value = "";
    document.getElementById("result").innerText = "";
}
