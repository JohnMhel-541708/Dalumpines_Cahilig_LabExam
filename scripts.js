// ERROR MODAL

document.addEventListener("DOMContentLoaded", function () {
  let modal = document.getElementById("errorModal");
  let modalMessage = document.getElementById("modalMessage");
  let serverError = document.getElementById("serverError");
  let closeBtn = document.getElementsByClassName("close")[0];

  // If PHP passed an error, show modal
  if (serverError && serverError.textContent.trim() !== "") {
    modalMessage.textContent = serverError.textContent;
    modal.style.display = "block";
  }

  // Close modal when clicking outside the content
  window.onclick = function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
});


// INPUT VALIDATION

document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      let user = document.getElementById("login_username").value;
      let pass = document.getElementById("login_password").value;
      let error = document.getElementById("loginError");

      if (user.trim() === "" || pass.trim() === "") {
        e.preventDefault();
        error.textContent = "All fields are required!";
        error.style.color = "red";
      }
    });
  }

  // PASSWORD PEEK
  function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.getElementById(iconId);

    if (passwordInput && toggleIcon) {
      toggleIcon.addEventListener("click", function () {
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          toggleIcon.classList.remove("fa-eye");
          toggleIcon.classList.add("fa-eye-slash");
        } else {
          passwordInput.type = "password";
          toggleIcon.classList.remove("fa-eye-slash");
          toggleIcon.classList.add("fa-eye");
        }
      });
    }
  }

  togglePassword("login_password", "toggleLoginPassword");
  togglePassword("register_password", "toggleRegisterPassword");
  togglePassword("confirm_password", "toggleConfirmPassword");
});


// CONFIRM MODAL

document.addEventListener("DOMContentLoaded", function () {
  let confirmModal = document.getElementById("confirmModal");
  let confirmYes = document.getElementById("confirmYes");
  let confirmNo = document.getElementById("confirmNo");
  let targetHref = ""; // Store target URL

  // Get all action buttons
  document.querySelectorAll(".actionBtn").forEach(btn => {
    btn.addEventListener("click", function () {
      targetHref = this.getAttribute("data-href"); // Get href from clicked button
      confirmModal.style.display = "flex"; // Show modal
    });
  });

  // YES -> redirect to the stored href
  confirmYes.addEventListener("click", function () {
    if (targetHref) {
      window.location.href = targetHref;
    }
  });

  // NO -> close modal
  confirmNo.addEventListener("click", function () {
    confirmModal.style.display = "none";
  });

  // Close if clicking outside modal-content
  window.addEventListener("click", function (event) {
    if (event.target === confirmModal) {
      confirmModal.style.display = "none";
    }
  });
});
