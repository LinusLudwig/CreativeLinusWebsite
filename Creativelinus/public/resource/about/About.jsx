import "./about.scss";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { useLayoutEffect } from "react";
gsap.registerPlugin(ScrollTrigger);

export const About = () => {
  useLayoutEffect(() => {}, []);

  return (
    <div className="about">
      <div className="contentWrapper">
        <div className="text">
          <h1>About</h1>
          <p>
            Im a young creative worker that specializyes in Game and Webdesign
          </p>
        </div>
        <img className="portrait" src="/src/resource/me.webp" alt="" />
      </div>
    </div>
  );
};
