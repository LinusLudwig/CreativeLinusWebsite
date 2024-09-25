import "./webDesign.scss";
import { useLayoutEffect, useRef, useState } from "react";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollAnim } from "../scrollAnim/ScrollAnim";
gsap.registerPlugin(ScrollTrigger);

const sectionHeight = "600vh";

export const WebDesign = () => {
  const [webExample, setWebExample] = useState(false);
  const scrollAnimRef = useRef(null);

  return (
    <div id="webDesign" className="webDesign" style={{ height: sectionHeight }}>
      <img src="/resource/webdesign_title.svg" className="titleWeb" alt="" />
      <div className="scrollAnimContainer" ref={scrollAnimRef}>
        <ScrollAnim
          frameCount="21"
          source={"/resource/websiteprevAnim/00"}
          onTrigger={setWebExample}
          triggerFrame={20}
          extra={40}
          sectionHeight={sectionHeight}
        />
      </div>
    </div>
  );
};
