<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    }
    body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: #937B4F;
    }

    .profile-pic {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 20px;
    }
    
    .profile-pic img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .container {
    position: relative;
    max-width: 700px;
    width: 100%;
    background: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .container header {
    font-size: 1.5rem;
    color: #333;
    font-weight: 500;
    text-align: center;
    }
    .container .form {
    margin-top: 30px;
    }
    .form .input-box {
    width: 100%;
    margin-top: 20px;
    }
    .input-box label .info{
    color: #333;
    }
    .form :where(.input-box input, .select-box, .info) {
    position: relative;
    height: 50px;
    width: 100%;
    outline: none;
    font-size: 1rem;
    color: #707070;
    margin-top: 8px;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 15px;
    }
    .input-box input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }
    .form .column {
    display: flex;
    column-gap: 15px;
    }

    .form button {
    height: 55px;
    width: 100%;
    color: #fff;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 30px;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    background: #937B4F;
    }
    .form button:hover {
    background: rgb(88, 56, 250);
    }
    /*Responsive*/
    @media screen and (max-width: 500px) {
    .form .column {
        flex-wrap: wrap;
    }
    .form :where(.gender-option, .gender) {
        row-gap: 15px;
    }
    .ioIocn {
      height:100px;
      width:100px;
    }
    .backIcon{
      height: 100px;
      width:100px;
    }
    }
    </style>
    <link rel="shortcut icon" href="Base/layered.png">
    <title>Layered</title>
  </head>
  <body>
    
  <section class="container">
    <div class="backIcon"><a href="/main"><ion-icon name="arrow-back-outline" class="ioIcon"></ion-icon></a></div>
    
        <div class="profile-pic">
            <img src="{{ asset('storage/' .$user->profile_image) }}" alt="Profile Picture">

        </div>
    <header>Profile</header>
    <form  action="{{ route('account.update') }}" method="POST" class="form" enctype="multipart/form-data">
        @csrf

        <div class="column">
            <div class="input-box">
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ $user->email }}" readonly>
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" value="{{ $user->password }}" readonly>
            </div>
            <div class="input-box">
                <label>Contact</label>
                <input type="text" name="contact_number" value="{{ $user->contact_number }}" readonly>
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Age</label>
                <input type="number" name="age" value="{{ $user->age }}" readonly>
            </div>
            <div class="input-box">
                <label>Gender</label>
                <input type="text" name="gender" value="{{ $user->gender }}" readonly>
            </div>
        </div>
        <div class="column" id="profileImageSection" style="display: none;">
            <div class="input-box">
                <label>Profile Image</label>
                <input type="file" name="profile_image">
            </div>
        </div>
        <input type="hidden" name="save_changes" id="saveChangesInput" value="0">
        <button type="button" id="editButton">Change Account Settings</button>
        <button type="submit" id="saveButton" style="display: none;">Save</button>
    </form>
<script>
  const editButton = document.getElementById('editButton');
  const saveButton = document.getElementById('saveButton');
  const saveChangesInput = document.getElementById('saveChangesInput');
  const profileImageSection = document.getElementById('profileImageSection');
  const accountForm = document.getElementById('accountForm');
  const profilePic = document.querySelector('.profile-pic img');

  editButton.addEventListener('click', () => {
    if (editButton.innerText === 'Change Account Settings') {
      // Enable input fields for editing
      const inputFields = document.querySelectorAll('.input-box input:not([name="profile_image"])');
      inputFields.forEach(input => {
        input.removeAttribute('readonly');
      });
      profileImageSection.style.display = 'block';
      editButton.innerText = 'Cancel';
      saveButton.style.display = 'block';
      saveChangesInput.value = '0';
    } else {
      // Disable input fields and revert changes
      const inputFields = document.querySelectorAll('.input-box input');
      inputFields.forEach(input => {
        input.setAttribute('readonly', true);
        input.value = input.defaultValue;
      });
      profileImageSection.style.display = 'none';
      editButton.innerText = 'Change Account Settings';
      saveButton.style.display = 'none';
      saveChangesInput.value = '0';
    }
  });
  accountForm.addEventListener('submit', (e) => {
  e.preventDefault(); // Prevent default form submission

  // Create a FormData object to send the form data via AJAX
  const formData = new FormData(accountForm);
  
  // Check if the saveButton is visible
  if (saveButton.style.display !== 'none') {
    saveChangesInput.value = '1'; // Set save_changes field to 1
  }

  // Send the form data via AJAX
  fetch(accountForm.action, {
    method: accountForm.method,
    body: formData,
  })
    .then(response => response.json()) // Parse response as JSON
    .then(data => {
      // Check if the response indicates success
      if (data.success) {
        // Update the necessary sections with the updated data
        document.getElementById('name').textContent = data.user.name;
        document.getElementById('email').textContent = data.user.email;
        document.getElementById('contact_number').textContent = data.user.contact_number;
        document.getElementById('age').textContent = data.user.age;
        document.getElementById('gender').textContent = data.user.gender;

        if (data.user.profile_image) {
          profilePic.src = data.user.profile_image;
        }

        // Display success message
        const message = document.getElementById('message');
        message.textContent = data.message;
        message.style.display = 'block';

        // Disable input fields and revert changes
        const inputFields = document.querySelectorAll('.input-box input');
        inputFields.forEach(input => {
          input.setAttribute('readonly', true);
          input.value = input.defaultValue;
        });
        profileImageSection.style.display = 'none';
        editButton.innerText = 'Change Account Settings';
        saveButton.style.display = 'none';
        saveChangesInput.value = '0';
      } else {
        // Display error message
        const message = document.getElementById('message');
        message.textContent = data.message;
        message.style.display = 'block';
      }
    })
    .catch(error => {
      // Display error message
      const message = document.getElementById('message');
      message.textContent = 'An error occurred. Please try again later.';
      message.style.display = 'block';
      console.error(error);
    });
});

</script>


</section>

  </body>
</html>
