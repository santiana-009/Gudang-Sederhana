function addItem() {
    var table = document.getElementById("itemTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);

    // Generate unique IDs
    var selectId = 'mySelect' + table.rows.length;
    var barcdId = 'barcode' + table.rows.length;
    var selectId2 = 'select_brcd' + table.rows.length;
    var selectId3 = 'name_item' + table.rows.length;
    var selectId4 = 'input_item' + table.rows.length;

    // Build HTML content using template literals
    cell1.innerHTML = `<div class="row"  style="display: flex; justify-content: space-between;">
                        <div style="width:25%;">
                            <select class='form-select selectItem' name='no_item[]' id="${selectId}" onchange="populateName(this, ${table.rows.length});"></select>
                        </div>
                        <div class="brcd" style="width:75%;">
                            <input type="text" class="form-control ${selectId3}" name="name_item[]" readonly>
                            <input style="display: none;" class="form-control ${selectId2}" id="${selectId2}" name="select_brcd[]">
                        </div>
                    </div>
                    `;
    cell2.innerHTML = `<input type="number" class="form-control" name="po_item[]" required>`;
    cell3.innerHTML = `<input type='number' class='form-control' name='qty_item[]' id='${selectId4}' oninput='addBarcode(${table.rows.length})'><div class='invalid-feedback'>Input Amount.</div>`;
    cell4.innerHTML = `<table id="${barcdId}"><tbody><tr></tr></tbody></table>`;
    cell5.innerHTML = "<button type='button' class='btn btn-dark' onclick='deleteline(this)'>Delete</button>";

    // Populate the select element with options using the items from Laravel
    var selectElement = document.getElementById(selectId);
    items.forEach(item => {
        var option = document.createElement("option");
        option.value = item.no_item;
        option.text = item.no_item;
        selectElement.add(option);
    });

    // Initialize Select2 for the newly added element
    $(`#${selectId}`).select2({
        searchInputPlaceholder: "Select Items",
    });
}

function populateName(select, rowNumber) {
    var selectedOption = select.options[select.selectedIndex];
    var container = select.closest('.row');  // Updated to use closest()

    var name_Item = 'name_item' + rowNumber;
    var select_Brcd = 'select_brcd' + rowNumber;

    var nameInput = container ? container.querySelector('.' + name_Item) : null;
    var brcdInput = container ? container.querySelector('.' + select_Brcd) : null;

    var nameValue = selectedOption.value;

    if (nameInput) {
        $.ajax({
            type: "POST",
            url: "/name_item",
            data: { no_item: nameValue, _token: $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                console.log("Response from name_item:", data);
                nameInput.value = data;
            }
        });
    }

    if (brcdInput) {
        $.ajax({
            type: "POST",
            url: "/brcd_item",
            data: { no_item: nameValue, _token: $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                console.log("Response from brcd_item:", data);
                brcdInput.value = data;
                addBarcode(rowNumber);
            }
        });
    }
}

function deleteline(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function addBarcode(rowNumber) {
    var select_Brcd = 'select_brcd' + rowNumber;
    var input_Item = 'input_item' + rowNumber;
    var selectValue = $('#'+select_Brcd).val();
    var inputValue = $('#'+input_Item).val();
    
    var tableId = 'barcode' + rowNumber;
    var tableBarcode = document.getElementById(tableId).getElementsByTagName('tbody')[0];

    var rowCount = tableBarcode.rows.length;
    for (var i = rowCount - 1; i > 0; i--) {
        tableBarcode.deleteRow(i);
    }

    // Add input fields for "Barcode" based on user input
    if (selectValue == '1') {
        var existingBarcodes = [];
    
        for (var i = 0; i < inputValue; i++) {
            var rowBarcode = tableBarcode.insertRow(tableBarcode.rows.length);
            var cellBarcode = rowBarcode.insertCell(0);
            var inputBarcode = document.createElement('input');
            inputBarcode.type = 'text';
            inputBarcode.className = 'form-control';
            inputBarcode.name = 'no_brcd[]';
            inputBarcode.required = true;
    
            inputBarcode.addEventListener('blur', function() {
                var inputValue = this.value.trim();
    
                if (existingBarcodes.includes(inputValue)) {
                    alert('duplicate values in No Barcode');
                    this.value = '';
                } else {
                    existingBarcodes.push(inputValue); 
                }
            });
    
            cellBarcode.appendChild(inputBarcode);
        }
    }
    
}

var form = document.getElementById('formil');

form.addEventListener('submit', function(event) {
    var selectedValues = $('select[name="no_item[]"]').map(function() {
        return $(this).val();
    }).get();

    if (hasDuplicates(selectedValues)) {
        alert("duplicate values in No Material");
        event.preventDefault();
    }
});

function hasDuplicates(array) {
    return (new Set(array)).size !== array.length;  
}
