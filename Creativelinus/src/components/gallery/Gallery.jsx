import "./gallery.scss";
import PhotoAlbum from "react-photo-album";
import { useImageSize, getImageSize } from "react-image-size";
import { useEffect, useState } from "react";

import Lightbox from "yet-another-react-lightbox";
import Counter from "yet-another-react-lightbox/plugins/counter";
import Thumbnails from "yet-another-react-lightbox/plugins/thumbnails";
import "yet-another-react-lightbox/styles.css";
import "yet-another-react-lightbox/plugins/counter.css";
import "yet-another-react-lightbox/plugins/thumbnails.css";
import Video from "yet-another-react-lightbox/plugins/video";
import Captions from "yet-another-react-lightbox/plugins/captions";
import "yet-another-react-lightbox/plugins/captions.css";

import { FaPlayCircle } from "react-icons/fa";

const photos = [
  {
    src: "/resource/gallery/randomgame.webp",
    type: "video",
    description: "Two worlds made in Unity for VR",
  },
  {
    src: "/resource/gallery/treegen.webp",
    type: "video",
    description: "Voxel tree generator made in Houdini",
  },
  {
    src: "/resource/gallery/treegen_color.webp",
    description: "Color version of voxel tree generator made in Houdini",
  },
  {
    src: "/resource/gallery/oldtrain_1.webp",
    description: "Voxel model of an old train made in Cinema 4D",
  },
  {
    src: "/resource/gallery/oldtrain_2.webp",
    description: "Voxel model of an old train made in Cinema 4D",
  },
  {
    src: "/resource/gallery/oldtrain_3.webp",
    description: "Voxel model of an old train made in Cinema 4D",
  },
  {
    src: "/resource/gallery/oldtrain_4.webp",
    description: "Voxel model of an old train made in Cinema 4D",
  },
  {
    src: "/resource/gallery/newtrain_1.webp",
    description: "Voxel model of a japanese train made in Cinema 4D",
  },
  {
    src: "/resource/gallery/newtrain_2.webp",
    description: "Voxel model of a japanese train made in Cinema 4D",
  },
  {
    src: "/resource/gallery/newtrain_3.webp",
    description: "Voxel model of a japanese train made in Cinema 4D",
  },
  {
    src: "/resource/gallery/newtrain_4.webp",
    description: "Voxel model of a japanese train made in Cinema 4D",
  },
  {
    src: "/resource/gallery/pinegen.webp",
    type: "video",
    description: "Voxel pine tree generator made in Houdini",
  },
  {
    src: "/resource/gallery/sayori_house.webp",
    description: "Voxel japanese house made in Cinema 4D",
  },
  {
    src: "/resource/gallery/sayori_street.webp",
    description:
      "Street render of japanese voxel houses at night made in Cinema 4D",
  },
  {
    src: "/resource/gallery/sayori_room.webp",
    description: "Voxel room render made in Cinema 4D",
  },
  {
    src: "/resource/gallery/city2.webp",
    description:
      "City with procedurally generated voxel buildings made in Houdini rendered in Cinema 4D",
  },
  {
    src: "/resource/gallery/city.webp",
    description:
      "Procedurally generated voxel city made in Houdini rendered in Cinema 4D",
  },
  {
    src: "/resource/gallery/jungle_render.webp",
    description: "Procedurally generated voxel jungle made in Houdini",
  },
  {
    src: "/resource/gallery/hospital_hallway.webp",
    description: "Creepy voxel hospital made in Blender",
  },
  {
    src: "/resource/gallery/school.webp",
    description: "Voxel school made in Blender",
  },
  {
    src: "/resource/gallery/police_station.webp",
    description: "Voxel police station made in Cinema 4D",
  },
  {
    src: "/resource/gallery/chrishmasHouse.webp",
    description: "Voxel christmas house made in Cinema 4D",
  },
  {
    src: "/resource/gallery/sayori_render.webp",
    description:
      "Voxel charakter design made in Cinema 4D based on the charakter Sayori from the game Doki Doki Literatur Club",
  },
  {
    src: "/resource/gallery/monika_render.webp",
    description:
      "Voxel charakter design made in Cinema 4D based on the charakter Monika from the game Doki Doki Literatur Club",
  },
  {
    src: "/resource/gallery/girl_render.webp",
    description: "Voxel charakter design made in Cinema 4D",
  },
];

export const Gallery = () => {
  const [images, setImages] = useState([]);
  const [imgIndex, setImgIndex] = useState(-1);

  async function loadImages() {
    var loadedImages = [];
    try {
      for (let i = 0; i < photos.length; i++) {
        const imageSrc = photos[i].src;
        const dimensions = await getImageSize(imageSrc);
        loadedImages.push({
          src: imageSrc,
          width: dimensions.width,
          height: dimensions.height,
          type: photos[i].type ?? "image",
          description: photos[i].description,
          sources: photos[i].type === "video" && [
            { src: photos[i].src.replace(".webp", ".mp4"), type: "video/mp4" },
          ],
        });
      }
      setImages(loadedImages);
    } catch (error) {
      console.error(error);
    }
  }

  useEffect(() => {
    loadImages();
  }, []);

  return (
    <div className="ImageGallery" id="gallery">
      <h1>More Works</h1>
      <PhotoAlbum
        className="photoAlbum"
        layout="rows"
        onClick={({ index }) => {
          setImgIndex(index);
        }}
        photos={images}
        renderPhoto={({ photo, renderDefaultPhoto }) => (
          <div style={{ position: "relative" }}>
            {photo.type === "video" && (
              <FaPlayCircle
                style={{
                  position: "absolute",
                  zIndex: "2",
                  mixBlendMode: "difference",
                  scale: "4",
                  left: "50%",
                  top: "50%",
                }}
              />
            )}
            {renderDefaultPhoto({ wrapped: true })}
          </div>
        )}
      />

      <Lightbox
        plugins={[Counter, Thumbnails, Video, Captions]}
        thumbnails={{
          imageFit: "cover",
          padding: 0,
          borderRadius: 20,
          borderStyle: "none",
        }}
        counter={{ container: { style: { top: 0, bottom: "unset" } } }}
        slides={images}
        index={imgIndex}
        open={imgIndex >= 0}
        close={() => setImgIndex(-1)}
        styles={{
          container: {
            backgroundColor: "rgba(0, 0, 0, .5)",
          },
          image: { borderRadius: 40 },
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
