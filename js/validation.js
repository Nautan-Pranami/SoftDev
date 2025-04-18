document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("registrationForm");
  
    form.addEventListener("submit", function (e) {
      let isValid = true;
  
      // Get field values
      const name = document.getElementById("name");
      const studentID = document.getElementById("student_id");
      const email = document.getElementById("email");
      const language = document.getElementById("language");
  
      // Error Elements
      const errorName = document.getElementById("errorName");
      const errorID = document.getElementById("errorID");
      const errorEmail = document.getElementById("errorEmail");
      const errorLang = document.getElementById("errorLang");
  
      // Reset error messages
      errorName.style.display = "none";
      errorID.style.display = "none";
      errorEmail.style.display = "none";
      errorLang.style.display = "none";
  
      // Name validation
      if (name.value.trim() === "") {
        errorName.style.display = "block";
        isValid = false;
      }
  
      // Student ID validation
      if (studentID.value.trim() === "") {
        errorID.style.display = "block";
        isValid = false;
      }
  
      // Email validation
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email.value.trim() === "" || !emailPattern.test(email.value)) {
        errorEmail.style.display = "block";
        isValid = false;
      }
  
      // Language selection validation
      if (language.value === "") {
        errorLang.style.display = "block";
        isValid = false;
      }
  
      // Prevent form submission if invalid
      if (!isValid) {
        e.preventDefault();
      }
    });
  });
  