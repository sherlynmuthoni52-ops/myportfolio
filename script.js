const introText = document.querySelector("#intro-text");
const highlightButton = document.querySelector("#highlight-btn");
const serviceList = document.querySelector("#services-list");
const serviceCount = document.querySelector("#service-count");
const filterButtons = document.querySelectorAll(".filter-btn");
const contactForm = document.querySelector("#contact-form");
const formMessage = document.querySelector("#form-message");

let services = [];

if (introText) {
  introText.textContent = "I'm Sherlyn Muthoni, an IT student building websites while growing my skills in cybersecurity and artificial intelligence.";
}

if (highlightButton) {
  highlightButton.addEventListener("click", () => {
    document.body.classList.toggle("skills-highlighted");
    highlightButton.textContent = document.body.classList.contains("skills-highlighted")
      ? "Remove highlight"
      : "Highlight skills";
  });
}

document.addEventListener("keydown", (event) => {
  if (event.key.toLowerCase() === "h") {
    document.body.classList.toggle("skills-highlighted");
  }
});

function renderServices(items) {
  if (!serviceList || !serviceCount) {
    return;
  }

  serviceCount.textContent = `${items.length} service${items.length === 1 ? "" : "s"} shown`;
  serviceList.innerHTML = items
    .map(
      (service) => `
        <article class="service-card" data-category="${service.category}">
          <span class="category-label">${service.category}</span>
          <h3>${service.title}</h3>
          <p>${service.description}</p>
        </article>
      `
    )
    .join("");
}

function filterServices(category) {
  const filteredServices =
    category === "all"
      ? services
      : services.filter((service) => service.category === category);

  renderServices(filteredServices);
}

filterButtons.forEach((button) => {
  button.addEventListener("click", () => {
    filterButtons.forEach((item) => item.classList.remove("active"));
    button.classList.add("active");
    filterServices(button.dataset.filter);
  });
});

if (serviceList) {
  fetch("data/services.json")
    .then((response) => response.json())
    .then((data) => {
      services = data;
      renderServices(services);
    })
    .catch(() => {
      serviceCount.textContent = "Services could not be loaded right now.";
    });
}

function showError(fieldId, message) {
  const errorElement = document.querySelector(`#${fieldId}-error`);

  if (errorElement) {
    errorElement.textContent = message;
  }
}

function clearErrors() {
  document.querySelectorAll(".error-message").forEach((error) => {
    error.textContent = "";
  });

  if (formMessage) {
    formMessage.textContent = "";
    formMessage.className = "form-message";
  }
}

function validateContactForm() {
  const name = document.querySelector("#name");
  const email = document.querySelector("#email");
  const message = document.querySelector("#message");
  let isValid = true;

  clearErrors();

  if (name.value.trim().length < 2) {
    showError("name", "Please enter at least 2 characters.");
    isValid = false;
  }

  if (!email.value.includes("@") || !email.value.includes(".")) {
    showError("email", "Please enter a valid email address.");
    isValid = false;
  }

  if (message.value.trim().length < 10) {
    showError("message", "Please write a message of at least 10 characters.");
    isValid = false;
  }

  return isValid;
}

if (contactForm) {
  contactForm.addEventListener("submit", (event) => {
    event.preventDefault();

    if (!validateContactForm()) {
      formMessage.textContent = "Please fix the highlighted fields.";
      formMessage.classList.add("error");
      return;
    }

    formMessage.textContent = "Thank you. Your message is ready to send.";
    formMessage.classList.add("success");
    contactForm.reset();
  });
}
