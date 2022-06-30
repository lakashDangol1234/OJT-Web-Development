document.getElementById('showStudent').classList.add('active');

// Edit Operation 
// Grabbing edit buttons of all students
let editButtons = document.getElementsByClassName('edit-btn');


// For edit Modal 
let nameField = document.getElementById('editName');
let addressField = document.getElementById('editAddress');
let contactField = document.getElementById('editContact');
let editSid = document.getElementById('editSid'); // hidden input

// Iterating through all the editButtons 
Array.from(editButtons).forEach(editButton => {
    // Some event that happen after clicking edit button
    editButton.addEventListener('click', (event) => {
        // Note: Modal gets Opened after editButton is clicked

        // Putting the existing value of targeted student record in the modal field :
        let studentRecord = event.target.parentElement.parentElement; // <tr> tag of Student on which edit button is clicked

        /* Sample:
        <tr>
            <th scope="row" class="student-info">1</th>
            <td class="student-info">Lakash Dangol</td>
            <td class="student-info">Khokana , lalitpur</td>
            <td class="student-info">1234567890</td>
            <td>
                <button class="btn btn-primary edit-btn" id="edit-1" data-bs-toggle="modal"
                    data-bs-target="#editStudentModal">Edit</button>
                <button class="btn btn-danger delete-btn" id='delete-1' data-bs-toggle="modal"
                    data-bs-target="#deleteStudentModal">Delete</button>
            </td>
        </tr>
        */

        // Grabbing values from the row of table where edit button is clicked 
        let studentInformation = studentRecord.getElementsByClassName('student-info');
        let studentId = studentInformation[0];
        let studentName = studentInformation[1];
        let studentAddress = studentInformation[2];
        let studentContact = studentInformation[3];

        // Putting values in field in modal 
        editSid.value = studentId.innerText; // hidden input
        nameField.value = studentName.innerText;
        addressField.value = studentAddress.innerText;
        contactField.value = studentContact.innerText;

    })
})


// Delete Operation 
// Grabbing delete buttons of all students
let deleteButtons = document.getElementsByClassName('delete-btn');

// For delete Modal 
let deleteSid = document.getElementById('deleteSid'); // hidden input


// Iterating through all the editButtons 
Array.from(deleteButtons).forEach(deleteButton => {
    // Some event that happen after clicking delete button
    deleteButton.addEventListener('click', (event) => {
        // Note: Modal gets Opened after deleteButton is clicked

        // Trying to grab the sid for sending through POST request:
        let studentRecord = event.target.parentElement.parentElement; // <tr> tag of Student on which delete button is clicked

        let studentId = studentRecord.getElementsByClassName('student-info')[0];
        deleteSid.value = studentId.innerText; // hidden input
    })
})




