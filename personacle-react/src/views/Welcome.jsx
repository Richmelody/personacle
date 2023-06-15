import React from "react";
import Banner from "../components/Banner";
import Header from "../components/Header";
import Hero from "../components/Hero";

export default function Welcome({children}) {
  return (
    <div className="flex flex-col min-h-screen overflow-hidden supports-[overflow:clip]:overflow-clip">
      <Header />
      <Hero />
      {children}
      <Banner />
    </div>
  );
}
