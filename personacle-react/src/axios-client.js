import axios from "axios";
window.axios = axios;

axios.defaults.withCredentials = true;

const axiosClient = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL,
});

axiosClient.interceptors.request.use((config) => {
  const token = localStorage.getItem("ACCESS_TOKEN");

  config.headers.Authorization = `Bearer ${token}`;
  config.headers.Accept = `application/json`;

  return config;
});

axiosClient.interceptors.response.use(
  (response) => response,
  async (error) => {
    const { response } = error;

    if (status === 419) {
        // Refresh our session token
        await axios.get('/sanctum/csrf-cookie')
    
        // Return a new request using the original request's configuration
        return axios(err.response.config)
      }

    if (response.status === 401) {
      localStorage.removeItem("ACCESS_TOKEN");
    }

    throw error;
  }
);

export default axiosClient;
