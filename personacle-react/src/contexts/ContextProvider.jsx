import { createContext, useState, useContext } from "react";

const stateContext = createContext({
  user: null,
  token: null,
  setUser: () => {},
  setToken: () => {},
});

export const ContextProvider = ({ children }) => {
  const [user, setUser] = useState({});
  const [token, _setToken] = useState(localStorage.getItem("ACCESS_TOKEN"));

  const setToken = (token) => {
    _setToken(token);

    if (token) {
      localStorage.setItem("ACCESS_TOKEN", token);
    } else {
      localStorage.removeItem("ACCESS_TOKEN");
    }
  };

  const data = {
    user,
    token,
    setUser,
    setToken,
  };

  return (
        <stateContext.Provider value={data}>
            {children}
        </stateContext.Provider>
    );
};

export const useStateContext = () => useContext(stateContext);