import React from "react";
import "./baseSlideShow.scss";

export const BaseSlideshow = () => {
  return (
    <div className="BaseSlideshow">
      <div className="sliderContainer">
        <div className="slide">
          <h1>AttackOnTitan</h1>
        </div>
        <div className="slide">
          <h1>Farming Game</h1>
        </div>
        <div className="slide">
          <h1>Office</h1>
        </div>
      </div>
    </div>
  );
};
