<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="customAssets/customized_cake.css">
    <link rel="shortcut icon" href="Base/layered.png">
    
    <title>Layered</title>
</head>
<body>

    <div class="box">
        <div class="container">
            <div class ="home">
              <a href="/main">
              
                <ion-icon class="homeIcon" name="arrow-back-outline"></ion-icon>
              </a>
            </div>
            <div class="header">
                <header>Customized Cake</header>
            </div>
        

            <br>
            <br>
            <br>

            <div><p class="select-your-choice">Select your choice!</p></div>
           
            <form action="{{ route('submit-form') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flavors">
                <li style="list-style: none;">
                    <ul id="flavorselect" class="flavorselect">
                        <label for="S1"><li class="flavor1"><input class="itemselect" type="checkbox" id="S1"  name="flavors[]" value="Chocolate" /><a>Chocolate</a>
                        </li></label>


                        <label for="S2"><li class="flavor2"><input class="itemselect" type="checkbox" id="S2" name="flavors[]" value="Red Velvet" /><a>Red Velvet</a>
                        </li></label>
                        
                    </ul>
                    <ul >
                        <li class="cusflavor">Customized
                            <ul id="flavorsize">
                                <label for="I1"><li><input class="itemselect" type="checkbox" id="I1" name="sizes[]" value="7x2.5" /><a>7x2.5 </a></li></label>
                                <label for="I2"><li><input class="itemselect" type="checkbox" id="I2" name="sizes[]" value="7x5" /><a>7x5 </a></li></label>
                                <label for="I3"><li><input class="itemselect" type="checkbox" id="I3" name="sizes[]" value="8x5"/><a>8x5</a></li></label>
                            </ul>
                        </li>
                    </ul>
                    
                </li>
            </div>
            <script>
        // select the checkboxes in each list
        const list1Checkboxes = document.querySelectorAll('#flavorselect input[type="checkbox"]');
        const list2Checkboxes = document.querySelectorAll('#flavorsize input[type="checkbox"]');
      
        // initialize the checked states of each list to false
        let list1Checked = false;
        let list2Checked = false;
      
        // add event listeners to the checkboxes in each list
        list1Checkboxes.forEach((checkbox) => {
          checkbox.addEventListener('click', () => {
            // if this checkbox was just checked
            if (checkbox.checked) {
              // uncheck any other checkboxes in list 1
              list1Checkboxes.forEach((otherCheckbox) => {
                if (otherCheckbox !== checkbox) {
                  otherCheckbox.checked = false;
                }
              });
              // update the checked state of list 1
              list1Checked = true;
              list2Checked = false;
            } else {
              // update the checked state of list 1
              list1Checked = false;
            }
          });
        });
      
        list2Checkboxes.forEach((checkbox) => {
          checkbox.addEventListener('click', () => {
            // if this checkbox was just checked
            if (checkbox.checked) {
              // uncheck any other checkboxes in list 2
              list2Checkboxes.forEach((otherCheckbox) => {
                if (otherCheckbox !== checkbox) {
                  otherCheckbox.checked = false;
                }
              });
              // update the checked state of list 2
              list2Checked = true;
              list1Checked = false;
            } else {
              // update the checked state of list 2
              list2Checked = false;
            }
          });
        });
            </script>
            <div class="upload">
                <button type = "button" class = "btn-warning">
                    <input type="file" name="referencePhoto" required>
                    <p class = "upload-button">Insert reference photo</p>
                    
                </button>
            </div>

            <div class="input-field">
                <input type="text" class="input" placeholder="Input dedication" id="" name="dedication" required>
            
            </div>

            <div class="input-field">
                <input type="text" class="input" placeholder="Input additional details" id="" name="additionalDetails" required>
                
            </div>

            <br><br>
            <div class="input-field">
            <input type="email" class="input" placeholder="Your Email" name="customerEmail" required>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Submit" id="">
            </div>
        </form>

        </div>
    </div>
    
    

</body>
</html>