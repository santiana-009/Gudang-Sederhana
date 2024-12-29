function addBrcd() {
    var table = document.getElementById("brcdTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);

    cell1.innerHTML = `<input type="text" class="form-control" name="no_brcd_defct[]" required>`;
    cell2.innerHTML = `<input type="textarea" class="form-control" name="coment_brcd_defct[]" required >`;
    cell3.innerHTML = "<button type='button' class='btn btn-dark' onclick='deleteline(this)'>Delete</button>";
}

function deleteline(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}