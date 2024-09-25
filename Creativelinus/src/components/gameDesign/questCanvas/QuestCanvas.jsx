import "./questCanvas.scss";
import { useRef, useEffect, useCallback } from "react";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

var imgMove = { x: 0, y: 0 };

export const QuestCanvas = ({ onShowScene }) => {
  const canvasRef = useRef(null);
  const parentRef = useRef(null);
  const images = [];

  useEffect(() => {
    // Quest Animation
    const frameCount = 41;
    let quest = { frame: 0 };
    const canvas = canvasRef.current;
    const context = canvas.getContext("2d");

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const checkFrame = () => {
      if (quest.frame >= 31) {
        onShowScene(true);
      } else {
        onShowScene(false);
      }
    };

    const currentFrame = (index) =>
      "/resource/questAnimation/00" + (index + 1).toString() + ".webp";

    for (let i = 0; i < frameCount; i++) {
      const img = new Image();
      img.src = currentFrame(i);
      images.push(img);
    }

    images[0].onload = () => {
      imgMove.x = images[0].width / -2;
      imgMove.y = images[0].height / -2;

      gsap.to(quest, {
        frame: frameCount - 1,
        snap: "frame",
        ease: "none",
        scrollTrigger: {
          scrub: true,
          pin: "canvas",
          end: "200%",
        },
        onUpdate: () => {
          doRender();
          checkFrame();
        },
      });

      doRender();
    };

    addEventListener("resize", () => {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      doRender();
    });

    const doRender = () => {
      const img = images[quest.frame];

      context.clearRect(0, 0, canvas.width, canvas.height);
      if (quest.frame === 40) {
        return;
      }

      var width = 0;
      var height = 0;

      if (window.innerWidth / 1920 >= window.innerHeight / 1080) {
        width = parentRef.current.offsetWidth;
        height = img.height * (parentRef.current.offsetWidth / img.width);
      } else {
        height = window.innerHeight;
        width = img.width * (window.innerHeight / img.height);
      }

      const offsetX = (width - parentRef.current.offsetWidth) / -2;
      const offsetY = (height - window.innerHeight) / -2;

      context.drawImage(img, offsetX, 0, width, height);
    };
  }, []);

  return (
    <div className="parent" ref={parentRef}>
      <canvas className="canvas" ref={canvasRef}></canvas>
    </div>
  );
};
