/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
$(document).ready(function () {
    $('#frmDate').on('input', function () {
        checkFromDate();
    });
});
$(document).ready(function () {
    $('#noofpassengers').on('input', function () {
        checkpassengerno();
    });
});
//$(document).ready(function () {
//     $('#frmDate').on('input', function () {
//        checkToDate();
//    });
//});
function checkpassengerno() {
    //const pnum = document.getElementById("noofpassengers");
    var pnum = $('#noofpassengers').val();
    if (pnum > 6) {
        //alert('Maximum passenger number is 6');
        $('#pnum_err').html('Maximum passenger number is 6');
    }
    else if (pnum <= 0) {
        //alert('Minimun passenger number is 1');
        $('#pnum_err').html('Minimun passenger number is 1');
    } else {
        $('#pnum_err').html('');

    }
}
function checkFromDate() {

    const dateInput = document.getElementById("frmDate");
    var inputDate = $('#frmDate').val();



    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);


    const oneMonthFromNow = new Date();
    oneMonthFromNow.setMonth(oneMonthFromNow.getMonth() + 1);
    oneMonthFromNow.setDate(oneMonthFromNow.getDate() + 1);

    const tomorrowString = formatDate(tomorrow);
    const oneMonthFromNowString = formatDate(oneMonthFromNow);


    dateInput.min = tomorrowString;
    dateInput.max = oneMonthFromNowString;
    //  console.log(inputDate);
    let minDate = new Date(dateInput.min);
    let maxDate = new Date(dateInput.max);
    //console.log(dateInput.min);
    // console.log(dateInput.max);
    if (!isNaN(minDate)) {
        let day = minDate.getDate();
        day = day < 10 ? "0" + day : day;
        let month = minDate.getMonth() + 1;
        month = month < 10 ? "0" + month : month;
        const year = minDate.getFullYear();

        minDate = `${day}/${month}/${year}`;


    }
    if (!isNaN(maxDate)) {
        maxDate.setDate(maxDate.getDate() - 1);
        let day = maxDate.getDate();
        day = day < 10 ? "0" + day : day;
        let month = maxDate.getMonth() + 1;
        month = month < 10 ? "0" + month : month;
        const year = maxDate.getFullYear();

        maxDate = `${day}/${month}/${year}`;


    }
    console.log(maxDate);
    if (dateInput.min > inputDate || dateInput.max < inputDate) {
        // console.log('invalid choice');

        $('#frmDate_err').html('Select date between ' + minDate + ' - ' + maxDate);
        const dateInput = document.getElementById("frmDate").value="";
    } else {
        $("#frmDate_err").html("");
        checkToDate();
        return true;
    }
    // Function to format a date as yyyy-mm-dd
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    document.addEventListener("DOMContentLoaded", function () {
        // ... (previous code)

        const dateForm = document.getElementById("myForm");

        dateForm.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent the form from submitting

            const selectedDate = dateInput.value;
            alert(`You selected: ${selectedDate}`);
        });
    });

}

function checkToDate() {
    var fromDateInput = document.getElementById("frmDate");
    var durationInput = document.getElementById("dur");
    var toDateOutput = document.getElementById("toDate");

    var fromDate = new Date(fromDateInput.value);
    var duration = durationInput.value;




    var fromDate = new Date(fromDateInput.value);


    if (isNaN(fromDate)) {
        alert("Invalid date format. Please use the datetime-local input format for From-Date.");
        return;
    }

    // Parse the duration to extract hours, minutes, and seconds
    var [hours, minutes, seconds] = duration.split(':').map(Number);

    // Create a new Date object for To-Date by adding the duration to From-Date
    var toDate = new Date(fromDate);
    toDate.setHours(toDate.getHours() + hours);
    toDate.setMinutes(toDate.getMinutes() + minutes);
    toDate.setSeconds(toDate.getSeconds() + seconds);
    //toDate = fromDate + toDate;
    console.log(toDate);

    // Update the output field with the calculated To-Date
    //                var formattedToDate = toDate.toISOString().slice(0, 16); // Extract the first 16 characters
    var year = toDate.getFullYear();
    var month = String(toDate.getMonth() + 1).padStart(2, '0');
    var day = String(toDate.getDate()).padStart(2, '0');
    var hours = String(toDate.getHours()).padStart(2, '0');
    var minutes = String(toDate.getMinutes()).padStart(2, '0');
    var formattedToDate = `${year}-${month}-${day}T${hours}:${minutes}`;

    toDateOutput.value = formattedToDate;
    console.log(toDateOutput);

}


