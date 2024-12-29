function addItem() {
    var table = document.getElementById("itemTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);

    var selectId = 'select_item' + table.rows.length;
    var barcdId = 'barcode' + table.rows.length;
    var selectId2 = 'value_brcd' + table.rows.length;
    var selectId3 = 'name_item' + table.rows.length;
    var selectId4 = 'input_item' + table.rows.length;
    var selectId5 = 'max_qty' + table.rows.length;

    cell1.innerHTML = `<div class="row"  style="display: flex; justify-content: space-between;">
                        <div style="width:23%;">
                            <select class='form-select selectItem' name='no_items[]' id="${selectId}" onchange="populateName(this, ${table.rows.length});"></select>
                        </div>
                        <div style="width:63%;">
                            <input type="text" class="form-control ${selectId3}" name="name_item[]" readonly>
                            <input style="display: none;" class="form-control ${selectId2}" id="${selectId2}" name="select_brcd[]">
                        </div>
                        <div style="width:14%;">
                            <input class="form-control ${selectId5}" id="${selectId5}">
                        </div>
                    </div>
                    `;
    cell2.innerHTML = `<input type='number' class='form-control' name='qty_items[]' id='${selectId4}' oninput='addBarcode(${table.rows.length})'><div class='invalid-feedback'>Input Amount.</div>`;
    cell3.innerHTML = `<table id="${barcdId}"><tbody><tr></tr></tbody></table>`;
    cell4.innerHTML = "<button type='button' class='btn btn-dark' onclick='deleteline(this)'>Delete</button>";

    $(document).ready(function(){
        $(`#${selectId}`).select2({
            placeholder: 'Select Items',
            ajax: {
                url: "/selectItem",
                processResults: function(data){
                    return {
                        results: data.results 
                    };
                }
            }
        });
    });
}

function populateName(select, rowNumber) {
    var selectedOption = select.options[select.selectedIndex];
    var container = select.closest('.row');  // Updated to use closest()

    var name_Item = 'name_item' + rowNumber;
    var select_Brcd = 'value_brcd' + rowNumber;
    var max_Qty = 'max_qty' + rowNumber;
    var input_Qty = 'input_item' + rowNumber;

    var nameInput = container ? container.querySelector('.' + name_Item) : null;
    var brcdInput = container ? container.querySelector('.' + select_Brcd) : null;
    var maxQty = container ? container.querySelector('.' + max_Qty) : null;

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

    if (maxQty) {
        $.ajax({
            type: "POST",
            url: "/max_qty",
            data: { no_item: nameValue, _token: $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                console.log("Response from max_qty:", data);
                document.getElementById(input_Qty).setAttribute('max', data);
                maxQty.value = data;
            }
        });

    }
}

function addBarcode(rowNumber) {
    var valueBrcd = 'value_brcd' + rowNumber;
    var selectItem = 'select_item' + rowNumber;
    var inputItem = 'input_item' + rowNumber;
    var id = $(`#${selectItem}`).val();
    var selectValue = $('#'+valueBrcd).val();
    var inputValue = $('#'+inputItem).val();
    
    var tableId = 'barcode' + rowNumber;
    var tableBarcode = document.getElementById(tableId).getElementsByTagName('tbody')[0];

    var rowCount = tableBarcode.rows.length;
    for (var i = rowCount - 1; i > 0; i--) {
        tableBarcode.deleteRow(i);
    }
    
    if (selectValue == "1") {
        console.log("Response from id:", id);
        $.ajax({
            type: "POST",
            url: '/selectBrcd',
            data: { no_item: id, _token: $('meta[name="csrf-token"]').attr('content') },
            success: function(results) {
                for (var i = 0; i < inputValue; i++) {
                    var newRowBarcode = tableBarcode.insertRow(tableBarcode.rows.length);
                    var cellBarcode = newRowBarcode.insertCell(0);
                    var select_Brcd = 'select_brcd' + rowNumber + 'abc' + tableBarcode.rows.length;
    
                    var optionsHtml = '';
                    for (var j = 0; j < results.length; j++) {
                        optionsHtml += '<option data-number="' + results[j].id + '">' + results[j].text + '</option>';
                    }
    
                    cellBarcode.innerHTML = `
                        <select class='form-control select2' id="${select_Brcd}" name='no_brcds[]'>
                            ${optionsHtml}
                        </select>`;
                    
                    $(`#${select_Brcd}`).select2({
                        placeholder: 'Select Barcode',
                    });
                }
            },
            error: function() {
                console.error("Failed to make Ajax request.");
            }
        });
    }
    
}

function deleteline(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

var form = document.getElementById('formil');

form.addEventListener('submit', function(event) {
    var selectedValues = $('select[name="no_brcds[]"]').map(function() {
        return $(this).val();
    }).get();
    var selectedValues2 = $('select[name="no_items[]"]').map(function() {
        return $(this).val();
    }).get();

    if (hasDuplicates(selectedValues)) {
        event.preventDefault();
        alert("duplicate values in No Barcode");
    }
    if (hasDuplicates(selectedValues2)) {
        event.preventDefault();
        alert("duplicate values in No Material");
    }
});

function hasDuplicates(array) {
    return (new Set(array)).size !== array.length;
}