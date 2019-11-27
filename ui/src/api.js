const apiEndpoint = 'localhost:8081/api/'
const apiResource = 'user'

export default {
  async getUsers() {
    try {
      const resp = await fetch(apiEndpoint + apiResource)
      return await resp.json()
    } catch (e) {
      alert(e.toString())
    }
  },
  async getUser(userId) {
    try {
      const resp = await fetch(apiEndpoint + apiResource + '/' + userId)
      return await resp.json()
    } catch (e) {
      alert(e.toString())
    }
  },
  async createUser(user) {
    try {
      const resp = await fetch(apiEndpoint + apiResource, {
        method: 'POST',
        body: JSON.stringify(user)
      })
      return await resp.json()
    } catch (e) {
      alert(e.toString())
    }
  },
  async deleteUser(userId) {
    try {
      const resp = await fetch(apiEndpoint + apiResource + '/' + userId, {method: 'DELETE'})
      return await resp.json()
    } catch (e) {
      alert(e.toString())
    }
  }
}