document.addEventListener('DOMContentLoaded', function() {  
    const form = document.querySelector('form');  
    if (form) {  
        form.addEventListener('submit', function(e) {  
            let isValid = true;  
            form.querySelectorAll('input[required]').forEach(function(input) {  
                if (!input.value.trim()) {  
                    isValid = false;  
                    input.classList.add('is-invalid');  
                } else {  
                    input.classList.remove('is-invalid');  
                }  
            });  

            if (!isValid) {  
                e.preventDefault(); // Stop form submission if validation fails  
                alert("Please fill all required fields.");  
            }  
        });  
    }  
});