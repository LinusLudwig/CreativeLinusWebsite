import "./gameDesign.scss";
import { useRef, useEffect, useState, useLayoutEffect } from "react";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { BgSlideshow } from "./slideshow/BgSlideshow";
import { QuestCanvas } from "./questCanvas/QuestCanvas";
import { ScrollAnim } from "../scrollAnim/ScrollAnim";

import Lightbox from "yet-another-react-lightbox";
import Counter from "yet-another-react-lightbox/plugins/counter";
import Thumbnails from "yet-another-react-lightbox/plugins/thumbnails";
import "yet-another-react-lightbox/styles.css";
import "yet-another-react-lightbox/plugins/counter.css";
import "yet-another-react-lightbox/plugins/thumbnails.css";

gsap.registerPlugin(ScrollTrigger);

const slides = [
  {
    title: "VR Attack on Titan fangame",
    description: "A 3D fangame of the anime Attack on Titan",
    color: "#524730",
    imgs: [
      "/resource/attackOnTitan/BG.webp",
      "/resource/attackOnTitan/1.webp",
      "/resource/attackOnTitan/2.webp",
      "/resource/attackOnTitan/3.webp",
      "/resource/attackOnTitan/4.webp",
      "/resource/attackOnTitan/5.webp",
      "/resource/attackOnTitan/6.webp",
      "/resource/attackOnTitan/7.webp",
    ],
  },
  {
    title: "VR Farming Game",
    description: "A VR game where you can farm and sell your crops",
    color: "#3A3A3A",
    imgs: [
      "/resource/VRFarmingGame/BG.webp",
      "/resource/VRFarmingGame/1.webp",
      "/resource/VRFarmingGame/2.webp",
      "/resource/VRFarmingGame/3.webp",
      "/resource/VRFarmingGame/4.webp",
    ],
  },
  {
    title: "Office model for VR game",
    description: "An office room for a VR game",
    color: "#3A3A3A",
    imgs: [
      "/resource/office/BG.webp",
      "/resource/office/1.webp",
      "/resource/office/2.webp",
      "/resource/office/3.webp",
      "/resource/office/4.webp",
      "/resource/office/5.webp",
    ],
  },
];

export const GameDesign = () => {
  const [imgIndex, setImgIndex] = useState(-1);
  const [showScene, setShowScene] = useState(false);
  const [currentSlide, setCurrentSlide] = useState(0);

  var lightboxGallery = slides[currentSlide].imgs.map((img, index) => {
    return { src: img, slide: 0 };
  });

  function getSlideStyle(slideIndex) {
    return {
      backgroundImage: `url(${slides[slideIndex].imgs[0]})`,
      opacity: currentSlide === slideIndex ? 1 : 0,
    };
  }

  function nextSlide() {
    setCurrentSlide(currentSlide === slides.length - 1 ? 0 : currentSlide + 1);
  }

  function prevSlide() {
    setCurrentSlide(currentSlide === 0 ? slides.length - 1 : currentSlide - 1);
  }

  return (
    <div id="gameDesign" className="gameDesign">
      <img src="/resource/gamedesign_title.svg" className="title" alt="" />
      <div className="scrollAnimParent">
        <QuestCanvas onShowScene={setShowScene} />
      </div>
      <div
        className="contentContainer"
        style={showScene ? { opacity: "1" } : { opacity: "0" }}
      >
        <div className="background">
          {slides.map((_, slideIndex) => (
            <div
              key={slideIndex}
              className="slide"
              style={getSlideStyle(slideIndex)}
            ></div>
          ))}
        </div>
        {slides.map((slide, slideIndex) => (
          <div className="containerTransition">
            <div className="content">
              <div
                className={
                  slideIndex === currentSlide ? "gallery active" : "gallery"
                }
              >
                <h2>Screenshots</h2>
                <div className="images">
                  {slide.imgs.map((img, imgIndex) => (
                    <img
                      key={imgIndex}
                      src={img}
                      alt={"img_" + imgIndex}
                      onClick={() => setImgIndex(imgIndex)}
                    />
                  ))}
                </div>
              </div>
              <div
                className={
                  slideIndex === currentSlide
                    ? "description active"
                    : "description"
                }
              >
                <h2>Description</h2>
                <p>{slides[slideIndex].description}</p>
              </div>
            </div>
          </div>
        ))}
        <div className="header">
          <img src="/resource/Arrow.svg" alt="prev" onClick={prevSlide} />

          {slides.map((_, slideIndex) => (
            <h1
              className={slideIndex === currentSlide ? "active" : ""}
              key={"title_" + slideIndex}
              onClick={() => setCurrentSlide(slideIndex)}
            >
              {slides[slideIndex].title}
            </h1>
          ))}
          <img src="/resource/Arrow.svg" alt="next" onClick={nextSlide} />
        </div>
      </div>
      <Lightbox
        plugins={[Counter, Thumbnails]}
        counter={{ container: { style: { top: 0, bottom: "unset" } } }}
        slides={lightboxGallery}
        index={imgIndex}
        open={imgIndex >= 0}
        close={() => setImgIndex(-1)}
        styles={{
          container: {
            backgroundColor: "rgba(0, 0, 0, .5)",
          },
          navigationPrev: { scale: ".5" },
          navigationNext: { scale: ".5" },
        }}
        render={{
          iconPrev: () => (
            <img
              className="carouselArrow"
              src="/resource/Arrow.svg"
              alt="prev"
            />
          ),
          iconNext: () => (
            <img
              className="carouselArrow"
              src="/resource/Arrow.svg"
              alt="next"
              style={{ rotate: "180deg" }}
            />
          ),
        }}
      />
    </div>
  );
};
