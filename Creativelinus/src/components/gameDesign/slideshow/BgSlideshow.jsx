import {
  useEffect,
  useState,
  useRef,
  forwardRef,
  useImperativeHandle,
} from "react";
import React from "react";
import "./bgSlideshow.scss";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export const BgSlideshow = forwardRef(({ slides, slideStyle }, ref) => {
  const [current, setCurrent] = useState(0);
  const slideShowRef = useRef(null);
  const slideShowContainerRef = useRef(null);
  const slideshowAnimRef = useRef(null);

  const getSlideStylesWB = (slideIndex) => ({
    backgroundImage: `url(${slides[slideIndex].url})`,
  });

  const getSlidesContainerWB = () => ({
    width: slides.length * 100 + "vw",
    transform: `translateX(-${(100 / slides.length) * current}%)`,
  });

  useImperativeHandle(ref, () => ({
    goPrev() {
      const isFirst = current === 0;
      const newIndex = isFirst ? slides.length - 1 : current - 1;
      setCurrent(newIndex);
    },

    goNext() {
      const isLast = current === slides.length - 1;
      const newIndex = isLast ? 0 : current + 1;
      setCurrent(newIndex);
    },
  }));

  useEffect(() => {
    gsap.to(slideshowAnimRef.current, {
      scrollTrigger: {
        trigger: slideShowRef.current,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
      },
      y: 1000,
      ease: "none",
    });
  }, []);

  return (
    <div className="slideshow" style={slideStyle} ref={slideShowRef}>
      <div className="slideshowAnim" ref={slideshowAnimRef}>
        <div
          style={getSlidesContainerWB()}
          ref={slideShowContainerRef}
          className="sliderContainer"
        >
          {slides.map((_, slideIndex) => (
            <div
              key={slideIndex}
              style={getSlideStylesWB(slideIndex)}
              className="slide"
            ></div>
          ))}
        </div>
      </div>
      <div className="vignette"></div>
    </div>
  );
});
