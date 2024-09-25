import { Navbar } from "../navbar/Navbar";
import "./start.scss";

export const Start = () => {
  return (
    <div className="start">
      {/* <div className="room" /> */}
      <img src="/resource/bgBase.webp" className="bgRoom" alt="" />
      <div className="noise" />
      <div className="welcome">
        <h1>Linus Ludwig</h1>
        <h2>Game & Webdesign</h2>
      </div>
      <Navbar />
    </div>
  );
};
