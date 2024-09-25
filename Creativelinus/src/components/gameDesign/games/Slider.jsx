import { useState } from "react";
import "./slider.scss";

export const Slider = ({ slides }) => {
  const [current, setCurrent] = useState(0);

  const getSlideStylesWB = (slideIndex) => ({
    width: "100%",
    backgroundImage: `url(${slides[slideIndex].url})`,
  });

  const getSlidesContainerWB = () => ({
    width: slides.length * 100 + "vw",
    transform: `translateX(-${(100 / slides.length) * current}%)`,
  });

  const goPrev = () => {
    const isFirst = current === 0;
    const newIndex = isFirst ? slides.length - 1 : current - 1;
    setCurrent(newIndex);
  };

  const goNext = () => {
    const isLast = current === slides.length - 1;
    const newIndex = isLast ? 0 : current + 1;
    setCurrent(newIndex);
  };

  return (
    <div className="slider">
      {/* arrows */}
      <div className="arrows">
        <a onClick={goPrev}>⇐</a>
        <a onClick={goNext}>⇒</a>
      </div>

      <div style={getSlidesContainerWB()} className="sliderContainer">
        {slides.map((_, slideIndex) => (
          <div
            key={slideIndex}
            style={getSlideStylesWB(slideIndex)}
            className="slide"
          ></div>
        ))}
      </div>
    </div>
  );
};
