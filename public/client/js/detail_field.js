document.getElementById('addBooking').addEventListener('click', function () {
    var date = document.getElementById('inputDate').value;
    var startTime = document.getElementById('inputStartTime').value;
    var endTime = document.getElementById('inputEndTime').value;
    var fieldChild = document.getElementById('inputFieldChild').value;
    var fieldOpenTime = document.getElementById('bookingTable').getAttribute('data-field-open-time');
    var fieldCloseTime = document.getElementById('bookingTable').getAttribute('data-field-close-time');

    if (
        date.trim() === '' ||
        fieldChild.trim() === '' ||
        startTime.trim() === '' ||
        endTime.trim() === ''
    ) {
        alert('Vui lòng điền đầy đủ thông tin.');
        return;
    }

    if (
        startTime < fieldOpenTime ||
        startTime >= endTime ||
        endTime > fieldCloseTime
    ) {
        alert('Thời gian không hợp lệ. Vui lòng kiểm tra lại.');
        return;
    }

    var table = document.getElementById('bookingTable');
    var rows = table.getElementsByTagName('tr');
    var isOverlap = false;

    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName('td');
        var cellDate = cells[0].innerHTML;
        var cellField = cells[1].innerHTML;
        var cellStartTime = cells[2].innerHTML;
        var cellEndTime = cells[3].innerHTML;

        if (date === cellDate 
            && fieldChild === cellField 
            &&((startTime >= cellStartTime 
                && startTime < cellEndTime) ||
            (endTime > cellStartTime 
                && endTime <= cellEndTime))) {
            isOverlap = true;
            alert('Thời gian trùng lặp với một đặt sân khác.');
            break;
        }
    }

    if (!isOverlap) {
        var row = table.insertRow(1);
        var cellDate = row.insertCell(0);
        var cellField = row.insertCell(1);
        var cellStartTime = row.insertCell(2);
        var cellEndTime = row.insertCell(3);
        var cellActions = row.insertCell(4);

        cellDate.innerHTML = date;
        cellField.innerHTML = fieldChild;
        cellStartTime.innerHTML = startTime;
        cellEndTime.innerHTML = endTime;
        cellActions.innerHTML = '<button class="btn btn-primary w-100 editBtn" >Edit</button>';

        // Đặt lại các phần tử input về giá trị mặc định
        document.getElementById('inputStartTime').value = '';
        document.getElementById('inputEndTime').value = '';
    }
});

document.getElementById('bookingTable').addEventListener('click', function (event) {
    if (event.target && event.target.classList.contains('editBtn')) {
        var row = event.target.closest('tr');
        
        var date = row.cells[0].innerHTML;
        var fieldChild = row.cells[1].innerHTML;
        var startTime = row.cells[2].innerHTML;
        var endTime = row.cells[3].innerHTML;
        
        document.getElementById('inputDate').value = date;
        document.getElementById('inputFieldChild').value = fieldChild;
        document.getElementById('inputStartTime').value = startTime;
        document.getElementById('inputEndTime').value = endTime;
        
        row.parentNode.removeChild(row);
    }
});
function bookField(fieldId) {
    // Lấy dữ liệu từ bookingTable
    var table = document.getElementById("bookingTable");
    var rowData = [];
    for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];
        var data = {
            ngayDat: row.cells[0].textContent,
            loaiSan: row.cells[1].textContent,
            gioBatDau: row.cells[2].textContent,
            gioKetThuc: row.cells[3].textContent
        };
        rowData.push(data);
    }

    // Kiểm tra xem mảng có dữ liệu hay không
    if (rowData.length === 0) {
        alert("Không có dữ liệu đặt sân.");
    } else {
        // Dữ liệu có sẵn, chuyển đến trang payment với tham số fieldId
        var params = encodeURIComponent(JSON.stringify(rowData));
        window.location.href = "/payment?bookingData=" + params + "&id=" + fieldId;
    }
}
