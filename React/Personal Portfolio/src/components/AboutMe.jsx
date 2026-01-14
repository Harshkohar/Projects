import mouseIcon from "../assets/mouse.svg";
import lineIcon from "../assets/Line.svg";
import Common from "./Common";
function AboutMe() {
  return (
    <Common backgroundImage="/AboutMe.png" bgColor="bg-background2">
        <div className="flex gap-30 mt-14">
          <div className="w-3/6 ml-20">
            <p className="font-ubuntu text-5xl text-white bg-background1 py-3 px-5 border-4 border-styling1 rounded-tl-3xl rounded-br-4xl w-fit tracking-widest mb-20">About Me</p>
            <p className="bg-background1 text-white rounded-4xl px-10 py-5 font-mono">
              <p className="text-styling1 mb-2">&lt;p&gt;</p>
              <p className="text-styling1 text-3xl tracking-wider font-bold font-mono">Hello!</p>
              <div className="mt-2">"I am a passionate and motivated Web Developer with hands-on experience in <span className="text-styling1">HTML, CSS, JavaScript, React.js, TailwindCSS and Node.js</span>. As a fresher, I bring strong problem-solving skills, creativity, and a constant eagerness to learn new technologies. I enjoy building responsive, user-friendly websites and applications that combine functionality with clean design.</div>
              <div className="mt-2">With a strong interest in the <span className="text-styling1">MERN</span> stack, I am continuously sharpening my skills through projects, coding challenges, and real-world applications. My goal is to grow as a Full-Stack Developer while contributing innovative ideas and solutions that add real value."</div>
              <p className="text-styling1 my-3">&lt;/p&gt;</p>
            </p>
          </div>
          <div>
            <img src="/AboutMeImage.png" alt="About Me" />
          </div>
        </div>
    </Common>
  );
}

export default AboutMe;