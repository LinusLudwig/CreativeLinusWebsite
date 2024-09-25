import "./app.scss";
import { GameDesign } from "./components/gameDesign/GameDesign";
import { Start } from "./components/start/Start";
import { WebDesign } from "./components/webDesign/WebDesign";
import { About } from "./components/about/About";
import { Gallery } from "./components/gallery/Gallery";
import { Footer } from "./components/footer/Footer";

function App() {
  return (
    <div>
      <Start />
      <GameDesign />
      <WebDesign />
      <About />
      <Gallery />
      <Footer />
    </div>
  );
}

export default App;
