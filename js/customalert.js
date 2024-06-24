
        // Function to show the custom alert box
        function showCustomAlert(message) {
            document.querySelector('.alert-message').textContent = message;
            document.getElementById('customAlert').style.display = 'flex';
        }

        // Event listener for the custom alert OK button
        document.querySelector('.alert-button').addEventListener('click', function() {
            document.getElementById('customAlert').style.display = 'none';
        });

        

       
    