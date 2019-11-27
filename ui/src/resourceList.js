import * as Api from './api'

class ResourceList {
  static render() {
    let users = [] //TODO: fetch users from api
    const App = document.getElementById('test-app')
    const Ul = document.createElement("ul")

    users.forEach(() => {
      const Li = document.createElement("ul")
      // TODO: create li with delete button
    })
  }
}

export { ResourceList }