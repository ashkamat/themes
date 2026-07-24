const form = document.querySelector(".contact-form__form");
const firstName = form.querySelector("#firstName");
const lastName = form.querySelector("#lastName");
const phone = form.querySelector("#phone");
const phonePattern = /^$|^\+?\d+( \d+)*$/;
const email = form.querySelector("#email");
const emailPattern = /^[A-Za-z0-9._%+-]+@(?:[A-Za-z0-9-]+\.)+[A-Za-z]{2,63}$/;
const message = form.querySelector("#message");
const termsCheckbox = form.querySelector("#terms");
let errors = [];

const inputTargets = [
  firstName,
  lastName,
  phone,
  email,
  message,
  termsCheckbox,
];

const alertMap = {
  "firstName": "z9Cr",
  "lastName": "v1Ra",
  "phone": "p7Xk",
  "email": "f4xA",
  "message": "n7sE",
  "terms": "g0C2",
};

const validate = () => {
  if (firstName.value === "") {
    const alert = document.querySelector("#z9Cr");
    alert.textContent = "First Name missing";
    alert.classList.add("contact-form__alert--error");
    if (!errors.includes(alert.id)) errors.push(alert.id);
  }

  if (lastName.value === "") {
    const alert = document.querySelector("#v1Ra");
    alert.textContent = "Last Name missing";
    alert.classList.add("contact-form__alert--error");
    if (!errors.includes(alert.id)) errors.push(alert.id);
  }

  if (email.value === "") {
    const alert = document.querySelector("#f4xA");
    alert.textContent = "Email missing";
    alert.classList.add("contact-form__alert--error");
    if (!errors.includes(alert.id)) errors.push(alert.id);
  } else if (!emailPattern.test(email.value)) {
    const alert = document.querySelector("#f4xA");
    alert.textContent = "Email incomplete";
    alert.classList.add("contact-form__alert--error");
    if (!errors.includes(alert.id)) errors.push(alert.id);
  }

  if (!phonePattern.test(phone.value)) {
    const alert = document.querySelector("#p7Xk");
    alert.textContent = "Only phone numbers allowed";
    alert.classList.add("contact-form__alert--error");
    if (!errors.includes(alert.id)) errors.push(alert.id);
  }

  if (message.value === "") {
    const alert = document.querySelector("#n7sE");
    alert.textContent = "Message missing";
    alert.classList.add("contact-form__alert--error");
    if (!errors.includes(alert.id)) errors.push(alert.id);
  }

  if (termsCheckbox.checked === false) {
    const alert = document.querySelector("#g0C2");
    alert.textContent = "Please check this box";
    alert.classList.add("contact-form__alert--error");
    if (!errors.includes(alert.id)) errors.push(alert.id);
  }

  if (errors.length === 0) return true;
};

const postForm = async () => {
  const formData = new FormData(form);
  const alert = document.querySelector("#u9aW");

  try {
    const response = await fetch("/contact_form/send-email.php", {
      method: "POST",
      body: formData,
    });

    if (!response.ok) throw new Error(`Response status: ${response.status}`);

    const resData = await response.json();

    if (resData.status === "success") {
      alert.textContent = resData.message;
      alert.classList.add("contact-form__alert--success");
    } else if (resData.status === "error") {
      alert.textContent = resData.message;
      alert.classList.add("contact-form__alert--error");
    }
  } catch (e) {
    alert.textContent = "Network error";
    alert.classList.add("contact-form__alert--error");
    console.error(e);
  }
};

inputTargets.forEach((element) => {
  element.addEventListener("input", (event) => {
    if (errors.length > 0) {
      errors.forEach((error) => {
        if (alertMap[event.target.id] === error) {
          const alert = document.querySelector(
            `#${alertMap[event.target.id]}`,
          );
          alert.textContent = "";
          alert.classList.remove("contact-form__alert--error");
          errors = errors.filter((alertId) => alertId !== error);
        }
      });
    }
  });
});

form.addEventListener("submit", (event) => {
  event.preventDefault();

  if (validate()) {
    postForm();
    form.reset();
  }
});
