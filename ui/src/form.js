import * as Api from './api'

class Form {
  static render() {
    const App = document.getElementById('test-app')
    const Form = document.createElement("form")

    const EmailInput = document.createElement("input")
    const PasswordInput = document.createElement("input")
    const SubmitInput = document.createElement("input")
    const Hr = document.createElement("hr")
    EmailInput.setAttribute("name", "email");
    EmailInput.setAttribute("type", "email");
    EmailInput.setAttribute("placeholder", "Email");
    PasswordInput.setAttribute("name", "password");
    PasswordInput.setAttribute("type", "password");
    PasswordInput.setAttribute("placeholder", "Password");
    SubmitInput.setAttribute("onclick", "createUser()");
    SubmitInput.setAttribute("type", "submit()");

    Form.appendChild(EmailInput)
    Form.appendChild(PasswordInput)
    Form.appendChild(SubmitInput)

    App.appendChild(Form)
    App.appendChild(Hr)
  }

  static createUser(e) {
    e.preventDefault()
  // TODO: get data from form and send to api, then update users list.
  }
}

export { Form }