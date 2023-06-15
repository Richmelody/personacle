import React from "react";
import { Link } from "react-router-dom";
import Logo from "./Logo";

export default function AuthForm({ children }) {
  return (
    <>
      <section className="w-full h-full bg-gray-50 dark:bg-gray-900">
        <div className="flex flex-col items-center justify-center h-full px-6 py-8 mx-auto lg:py-0">
          <Link
            to="/"
            className="flex items-center mb-4 text-2xl font-semibold text-gray-900 dark:text-white"
          >
            <span className="mr-2">
              <Logo />
            </span>
            Personacle
          </Link>
          <div className="w-full bg-white rounded-lg shadow dark:border sm:max-w-sm dark:bg-gray-800 dark:border-gray-700">
            {children}
          </div>
        </div>
      </section>
    </>
  );
}
