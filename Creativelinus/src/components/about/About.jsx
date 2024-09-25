import "./about.scss";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { useEffect, useRef } from "react";
import { SkillsIcons } from "./skillsIcons/SkillsIcons";

import { IoMail } from "react-icons/io5";
import { TiArrowSortedDown } from "react-icons/ti";

gsap.registerPlugin(ScrollTrigger);

export const About = () => {
  useEffect(() => {
    gsap.to("#scrollLink", {
      startAt: { y: -5 },
      y: "5px",
      repeat: -1,
      yoyo: true,
      duration: 1,
      ease: "power1.inOut",
    });
  }, []);

  return (
    <div className="about" id="about">
      <div className="bg"></div>
      <div className="contentWrapper">
        <div className="biography">
          <div className="text">
            <h1>Linus Ludwig</h1>
            <p>
              My passion is creating everything from games and websites to
              videos.
              <br />
              <br />I have experience in creating interactive experiences
              primarily for VR in Unreal Engine, building websites with form
              submissions and producing promotional videos.
            </p>
            <h2>Skills</h2>
            <SkillsIcons />
          </div>
          <img className="portrait" src="/resource/portrait_Site.webp" alt="" />
        </div>
        <div className="interested">
          <h2>Interested?</h2>
          <a href="mailto:contact@creativelinus.de">
            <IoMail /> contact@creativelinus.de
          </a>
        </div>
        <div className="notInterested">
          <h2>Still not Confinced?</h2>
          <a
            href="#gallery"
            onClick={(event) => {
              event.preventDefault();
              const element = document.getElementById("gallery");
              element?.scrollIntoView({ behavior: "smooth" });
            }}
          >
            <TiArrowSortedDown id="scrollLink" />
            <span>Scroll Down</span>
            <TiArrowSortedDown id="scrollLink" />
          </a>
        </div>
      </div>
    </div>
  );
};
