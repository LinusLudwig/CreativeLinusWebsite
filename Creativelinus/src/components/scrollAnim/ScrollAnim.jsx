import "./scrollAnim.scss";
import { useRef, useEffect, useState } from "react";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

const webSlides = [
  {
    title: "uzg-transporte.de",
    srcDesktop: "/resource/uzg-transporte.de_desktop.png",
    srcMobile: "/resource/uzg-transporte.de_mobile.png",
    link: "https://uzg-transporte.de",
  },
  {
    title: "Music Site",
    srcDesktop: "/resource/musicsite_desktop.png",
    srcMobile: "/resource/musicsite_mobile.png",
    link: "https://www.figma.com/proto/uP7MWKo2nop3nq8ne1A31n/MusicSite?type=design&node-id=0-3&t=i8HMoQbandSqoLI7-9&scaling=scale-down&page-id=0%3A1&starting-point-node-id=0%3A3&show-proto-sidebar=1",
  },
];

export const ScrollAnim = ({
  frameCount,
  source,
  triggerFrame,
  onTrigger,
  extra = 0,
  sectionHeight,
}) => {
  const canvasRef = useRef(null);
  const parentRef = useRef(null);
  const contentRef = useRef(null);
  const images = [];
  const desktop = useRef(null);
  const mobile = useRef(null);

  const [currentSlide, setCurrentSlide] = useState(0);

  /*function nextSlide() {
    setCurrentSlide(
      currentSlide === webSlides.length - 1 ? 0 : currentSlide + 1
    );
  }

  function prevSlide() {
    setCurrentSlide(
      currentSlide === 0 ? webSlides.length - 1 : currentSlide - 1
    );
  }*/

  useEffect(() => {
    let anim = { frame: 0 };
    const canvasObj = canvasRef.current;
    const context = canvasObj.getContext("2d");

    const doRender = () => {
      var img = images[anim.frame];
      if (anim.frame > frameCount - 1) {
        img = images[frameCount - 1];
      }
      context.clearRect(0, 0, canvasObj.width, canvasObj.height);
      context.drawImage(img, 0, 0, img.width, img.height);
    };

    const checkFrame = () => {
      if (anim.frame >= triggerFrame) {
        onTrigger(true);
      } else {
        onTrigger(false);
      }
    };

    const currentFrame = (index) => source + (index + 1).toString() + ".webp";

    for (let i = 0; i < frameCount; i++) {
      const img = new Image();
      img.src = currentFrame(i);
      images.push(img);
    }

    images[0].onload = () => {
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: parentRef.current,
          scrub: true,
          pin: true,
          end: () => {
            const height =
              (sectionHeight.slice(0, -2) / 100 - 1) * window.innerHeight;
            const stringHeight = height.toString() + "px";
            return stringHeight;
          },
        },
      });

      const canvasDuration = 0.2;

      tl.to(anim, {
        frame: frameCount - 1,
        snap: "frame",
        ease: "none",
        onUpdate: () => {
          doRender();
          checkFrame();
        },
        duration: canvasDuration,
      });

      tl.set(
        ".testContent",
        { opacity: 1 },
        canvasDuration - canvasDuration / frameCount
      );

      tl.set(
        ".mobile",
        { pointerEvents: "all" },
        canvasDuration - canvasDuration / frameCount
      );

      tl.set(
        ".desktop",
        { pointerEvents: "all" },
        canvasDuration - canvasDuration / frameCount
      );

      tl.to(
        desktop.current,
        {
          y: () => {
            return -(desktop.current.height - contentRef.current.offsetHeight);
          },
          ease: "none",
        },
        canvasDuration
      );

      tl.to(
        mobile.current,
        {
          y: () => {
            console.log("setting height to scroll to");
            return -(mobile.current.height - contentRef.current.offsetHeight);
          },
          ease: "none",
        },
        canvasDuration
      );
      resizeCanvas();
    };

    const resizeCanvas = () => {
      canvasObj.width = images[0].width;
      canvasObj.height = images[0].height;
      const imageWidth = images[0].width;
      const imageHeight = images[0].height;
      parentRef.current.style.maxWidth = `${imageWidth}px`;
      parentRef.current.style.maxHeight = `${imageHeight}px`;
      doRender();
    };

    addEventListener("resize", () => {
      resizeCanvas();
    });

    removeEventListener("resize", () => {
      resizeCanvas();
    });
  }, []);

  return (
    <div className="parent" ref={parentRef}>
      <div className="scrollAnim">
        <div className="testContent" ref={contentRef}>
          <a
            href={webSlides[currentSlide].link}
            target="_blank"
            className="desktop"
          >
            <h2>Go To Site</h2>
            <img
              ref={desktop}
              className=""
              src={webSlides[currentSlide].srcDesktop}
              alt=""
            />
          </a>
          <a target="_blank" className="mobile">
            <h2>Go To Site</h2>
            <img
              ref={mobile}
              className=""
              src={webSlides[currentSlide].srcMobile}
              alt=""
            />
          </a>
        </div>
        <canvas className="animCanvas" ref={canvasRef}></canvas>
        <div className="header">
          <img src="/resource/Arrow.svg" alt="prev" />

          {webSlides.map((_, slideIndex) => (
            <h1
              className={slideIndex === currentSlide ? "active" : ""}
              key={"title_" + slideIndex}
              onClick={() => setCurrentSlide(slideIndex)}
            >
              {webSlides[slideIndex].title}
            </h1>
          ))}
          <img src="/resource/Arrow.svg" alt="next" />
        </div>
      </div>
    </div>
  );
};
