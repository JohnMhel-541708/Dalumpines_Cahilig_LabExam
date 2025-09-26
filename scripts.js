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
  let targetHref = "";
  let targetForm = null;

  // Attach to all action buttons
  document.querySelectorAll(".actionBtn").forEach(btn => {
    btn.addEventListener("click", function (event) {
      event.preventDefault(); // Stop default redirect/submit
      targetHref = this.getAttribute("data-href");
      targetForm = this.closest("form"); // Check if inside form
      confirmModal.style.display = "flex";
    });
  });

  // YES -> do the action
  confirmYes.addEventListener("click", function () {
    if (targetForm) {
      targetForm.submit(); // For logout form
    } else if (targetHref) {
      window.location.href = targetHref; // For links (login, etc.)
    }
  });

  // NO -> close modal
  confirmNo.addEventListener("click", function () {
    confirmModal.style.display = "none";
    targetHref = "";
    targetForm = null;
  });

  // Close if clicking outside modal-content
  window.addEventListener("click", function (event) {
    if (event.target === confirmModal) {
      confirmModal.style.display = "none";
      targetHref = "";
      targetForm = null;
    }
  });
});



// NAV BAR HIGHLIGHT

document.addEventListener("DOMContentLoaded", () => {
  const sections = document.querySelectorAll("section");
  const navLinks = document.querySelectorAll(".nav-link");

  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.getAttribute("href").substring(1) === entry.target.id) {
              link.classList.add("active");
            }
          });
        }
      });
    },
    { threshold: 0.6 } // adjust: how much of section must be visible
  );

  sections.forEach(section => {
    observer.observe(section);
  });
});

