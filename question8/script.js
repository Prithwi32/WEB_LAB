function validate() {
    let usn = document.getElementById("usn").value.trim();
    let sub_code = document.getElementById("code").value.trim();
    let m1 = document.getElementById("marks1").value.trim();
    let m2 = document.getElementById("marks2").value.trim();
    let m3 = document.getElementById("marks3").value.trim();

    if (usn === "") {
        alert("Please enter your USN number");
        return;
    }
    if (sub_code === "") {
        alert("Please enter the subject code");
        return;
    }
    if (m1 === "" || m2 === "" || m3 === "") {
        alert("Please enter all marks");
        return;
    }

    m1 = parseFloat(m1);
    m2 = parseFloat(m2);
    m3 = parseFloat(m3);

    if (isNaN(m1) || isNaN(m2) || isNaN(m3)) {
        alert("Marks must be numeric");
        return;
    }

    if (m1 < 0 || m2 < 0 || m3 < 0 || m1 > 20 || m2 > 20 || m3 > 20) {
        alert("Marks should be between 0 and 20");
        return;
    }

    let marks = [m1, m2, m3];
    marks.sort(function(a, b) { return b - a; }); // Descending order
    let average = (marks[0] + marks[1]) / 2;

    let display =
        "USN: " + usn + "\n" +
        "Subject Code: " + sub_code + "\n" +
        "Marks 1: " + m1 + "\n" +
        "Marks 2: " + m2 + "\n" +
        "Marks 3: " + m3 + "\n";

    alert("The average of the best two tests is: " + average.toFixed(2) + "\n\n" + display);
}
