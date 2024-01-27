const themeToggle = document.getElementById("theme-toggle");
const body = document.body;
const form = document.querySelector("form");
const statusTxt = document.querySelector("form .button span");

// Retrieve the theme from local storage or use a default value
const savedTheme = localStorage.getItem("theme") || "light-mode";

// Apply the theme to the body
body.classList.add(savedTheme);

function updateButtonIcon() {
  themeToggle.innerHTML = body.classList.contains("dark-mode")
    ? '<i class="fas fa-sun"></i>'
    : '<i class="fas fa-moon"></i>';
}

// Initialize button icon based on the current theme
updateButtonIcon();

themeToggle.addEventListener("click", () => {
  // Toggle between light-mode and dark-mode
  body.classList.toggle("dark-mode");

  // Update the button icon
  updateButtonIcon();

  // Update the saved theme preference in local storage
  const currentTheme = body.classList.contains("dark-mode")
    ? "dark-mode"
    : "light-mode";
  localStorage.setItem("theme", currentTheme);
});

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  statusTxt.style.color = "var(--main-color)";
  statusTxt.style.display = "block";

  try {
    const formData = new FormData(form);
    const response = await fetch("message.php", {
      method: "POST",
      body: formData,
    });

    if (!response.ok) {
      throw new Error("Network response was not ok");
    }

    const result = await response.text();

    if (
      result.includes("Email and Subject field is required") ||
      result.includes("Enter a valid email address") ||
      result.includes("Sorry, failed to send your Message!")
    ) {
      statusTxt.style.color = "red";
    } else {
      form.reset();
      setTimeout(() => {
        statusTxt.style.display = "none";
      }, 3000);
    }

    statusTxt.innerText = result;
  } catch (error) {
    console.error("Error:", error);
    statusTxt.style.color = "red";
    statusTxt.innerText = "An error occurred. Please try again.";
  }
});
