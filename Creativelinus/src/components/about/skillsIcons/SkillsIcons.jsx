import React from "react";
import "./skillsIcons.scss";
import { RiReactjsLine } from "react-icons/ri";
import { SiUnrealengine } from "react-icons/si";
import { SiHoudini } from "react-icons/si";
import { IoLogoFigma } from "react-icons/io5";
import { BiLogoBlender } from "react-icons/bi";
import { SiCsswizardry } from "react-icons/si";
import { PiFileHtmlFill } from "react-icons/pi";
import { SiAdobephotoshop } from "react-icons/si";
import { SiAdobepremierepro } from "react-icons/si";

import "react-tooltip/dist/react-tooltip.css";
import { Tooltip } from "react-tooltip";

export const SkillsIcons = () => {
  return (
    <div className="skillsIcons">
      <RiReactjsLine data-tooltip-id="icon" data-tooltip-content="React" />
      <SiUnrealengine
        data-tooltip-id="icon"
        data-tooltip-content="Unreal Engine"
      />
      <SiHoudini data-tooltip-id="icon" data-tooltip-content="Houdini" />
      <IoLogoFigma data-tooltip-id="icon" data-tooltip-content="Figma" />
      <BiLogoBlender data-tooltip-id="icon" data-tooltip-content="Blender" />
      <SiCsswizardry data-tooltip-id="icon" data-tooltip-content="CSS" />
      <PiFileHtmlFill data-tooltip-id="icon" data-tooltip-content="HTML" />
      <SiAdobephotoshop
        data-tooltip-id="icon"
        data-tooltip-content="Photoshop"
      />
      <SiAdobepremierepro
        data-tooltip-id="icon"
        data-tooltip-content="Premiere Pro"
      />
      <Tooltip
        id="icon"
        place="bottom"
        effect="solid"
        variant="light"
        noArrow="true"
        className="tooltip"
      />
    </div>
  );
};
