import "./navbar.scss";

export const Navbar = () => {
  return (
    <div className="navbar">
      <div
        className="wrapper"
        onClick={(event) => {
          event.preventDefault();
          const target = event.target;
          const id = target.getAttribute("href")?.replace("#", "");
          const element = document.getElementById(String(id));
          element?.scrollIntoView({ behavior: "smooth" });
        }}
      >
        <ul>
          <li>
            <a href="#gameDesign">GameDesign</a>
          </li>
          <li>
            <a href="#webDesign">Webdesign</a>
          </li>
        </ul>
        <img src="/resource/Logo.svg" alt="Logo" />
        <ul>
          <li>
            <a href="#about">About</a>
          </li>
          <li>
            <a href="#gallery">Gallery</a>
          </li>
        </ul>
      </div>
    </div>
  );
};
