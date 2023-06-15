import { createBrowserRouter } from "react-router-dom";
import Login from "./views/Login";
import NotFound from "./views/404";
import Questions from "./views/Questions";
import Signup from "./views/Signup";
import GuestLayout from "./components/GuestLayout";
import AppLayout from "./components/AppLayout";
import Welcome from "./views/Welcome";

const router = createBrowserRouter([
  {
    path: "/",
    element: <Welcome />,
  },
  {
    path: "/",
    element: <GuestLayout />,
    children: [
      {
        path: "/login",
        element: <Login />,
      },
      {
        path: "/signup",
        element: <Signup />,
      },
    ],
  },
  {
    path: "/",
    element: <AppLayout />,
    children: [
      {
        path: "/questions",
        element: <Questions />,
      },
    ],
  },
  {
    path: "*",
    element: <NotFound />,
  },
]);

export default router;
