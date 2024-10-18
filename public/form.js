// (Work in Progress) - Dynamic form validation

/*
const register_form = document.getElementById('register_form');

register_form.addEventListener('submit', submit_register_form);

function submit_register_form(event) {
  event.preventDefault();

  // use Fetch API
  const formData = new FormData(register_form);
  formData.append('email', document.getElementById('email').value);
  formData.append('password', document.getElementById('password').value);

  fetch(register_form.action, {
    method: "POST",
    body: new URLSearchParams(formData)
  });

  fetch_errors("/register")
}

function fetch_errors(file) {
  fetch(file).then((response) => {
    console.log(response)

    if(!response.ok) {
      throw new Error("Something went wrong!");
    }

    return response.json();

  }).then((data) => {
    console.log(data)

  }).catch((error) => {

    console.log(error)

  });
}

function display_errors(errors) {

}

*/