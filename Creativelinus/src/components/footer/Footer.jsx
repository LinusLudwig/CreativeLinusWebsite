import "./footer.scss";

export const Footer = () => {
  return (
    <div className="footer">
      <h2>Linus Ludwig © 2024</h2>
      <div className="legal">
        <div className="contact">
          <h3>E-Mail</h3>
          <a href="mailto:kontakt@creativelinus.de">kontakt@creativelinus.de</a>
          <h3>Telefon</h3>
          <a href="tel:+4917663228571">+49 176 63228571</a>
        </div>
        <div className="address">
          <h3>Straße</h3>
          <p>Schillerstr.44</p>
          <h3>Ort</h3>
          <p>25746 Heide</p>
        </div>
      </div>
    </div>
  );
};
