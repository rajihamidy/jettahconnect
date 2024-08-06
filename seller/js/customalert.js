
        // Function to show the custom alert box
        function showCustomAlert(message) {
            document.querySelector('.alert-message').textContent = message;
            document.getElementById('customAlert').style.display = 'flex';
        }

        // Event listener for the custom alert OK button
        document.querySelector('.alert-button').addEventListener('click', function() {
            document.getElementById('customAlert').style.display = 'none';
        });

        

        function showCustomAlert(message, callback) {
            // Set the alert message
            document.querySelector('.alert-message').textContent = message;
            // Show the alert box
            document.getElementById('customAlert').style.display = 'flex';
            
            // Define the callback function for the OK button
            document.querySelector('.alert-button').onclick = function() {
                document.getElementById('customAlert').style.display = 'none';
                if (callback && typeof callback === 'function') {
                    callback();
                }
            };
        }
    