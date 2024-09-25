import { Slider } from "./Slider";
import "./games.scss";

export const Games = () => {
  const slides = [
    {
      url: "/resource/Game1_BG.webp",
      title: "VR Attack on Titan fangame",
      description: "A 3D fangame of the anime Attack on Titan",
    },
    {
      url: "/resource/Game2_BG.webp",
      title: "VR Farming Game",
      description: "A VR game where you can farm and sell your crops",
    },
    {
      url: "/resource/Game3_BG.webp",
      title: "Office model for VR game",
      description: "An office room for a VR game",
    },
  ];

  return (
    <div className="games">
      <Slider slides={slides} />
      <h1>GameDesign</h1>
    </div>
  );
};
