import mouseIcon from "../assets/mouse.svg";
import lineIcon from "../assets/Line.svg";
function Common({ backgroundImage, bgColor, overlayColor, title, children }) {
  return <>
    <div className={`relative p-15 bg-size-[100%_100%] bg-center ${bgColor}`} style={{ backgroundImage: `url(${backgroundImage})` }}>
      <div className={`absolute ${overlayColor} inset-0`}></div>
      <div className="relative z-10">
        <img src={mouseIcon} alt="Mouse" className="m-auto w-7" />
        <img src={lineIcon} alt="Line" className="m-auto" />
      </div>
      <div className="relative z-10 mt-10">
        <div className="text-center">
          <div className="text-styling1 font-ubuntu text-5xl">{title}</div>
        </div>
        {children}
      </div>
    </div>
  </>
}

export default Common;