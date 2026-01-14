import Common from "./Common";
import { ComputerIcon, ArrowBigRight, WavesIcon, SquareTerminalIcon ,Database } from "lucide-react";
import jsIcon from "../assets/js.svg";
import htmlIcon from "../assets/html5.svg";
import cssIcon from "../assets/css3-alt.svg";
import reactIcon from "../assets/react.svg";
import nodeJsIcon from "../assets/nodeJs.svg";

function Skills() {
  return (
    <Common backgroundImage="/Skills.png" overlayColor="bg-background1/90" title="Skills">

      <div className="flex items-center justify-center mt-2">
        <span className="w-2 h-2 rounded-full bg-styling1"></span>
        <span className="bg-styling1 w-28 h-0.5"></span>
        <span className="w-2 h-2 rounded-full bg-styling1"></span>
      </div>

      <p className="font-mono text-white mt-3 text-center">I am striving to never stop learning and improving</p>

      {/* Skills Tile 1 */}
      <div className="flex items-center gap-10 mt-15 justify-center">
        <div className="border-l-8 border-css rounded-lg bg-styling2 inline-block py-2 px-4 text-center font-mono tracking-widest">
          <ComputerIcon size={30} className="m-auto mb-2" />
          <p className="text-xl font-bold">Web Development</p>
        </div>
        <ArrowBigRight size={45} className="text-white ml-2" />
        <div>
          <div className="ml-15 flex gap-10 text-2xl items-center">
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-html flex gap-2"><img src={htmlIcon} alt="" />HTML</span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-css flex gap-2"><img src={cssIcon} alt="" />CSS</span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-js flex gap-2"><img src={jsIcon} alt="" />JavaScript</span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-react flex gap-2"><img src={reactIcon} alt="" />React</span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-green-600 flex gap-2"><img src={nodeJsIcon} alt="" />NodeJS</span>
          </div>
          <div className="ml-15 flex gap-10 text-2xl items-center mt-5">
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-tailwindcss flex items-center gap-2"><WavesIcon />TailwindCSS</span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-js flex items-center gap-2"><img src={jsIcon} alt="" />ExpressJs</span>
          </div>
        </div>
      </div>

      {/* Skills Tile 2 */}
      <div className="flex items-center gap-10 mt-10">
        <div className="border-l-8 border-css rounded-lg bg-styling2 inline-block py-2 px-4 text-center font-mono tracking-widest">
          <SquareTerminalIcon size={30} className="m-auto mb-2" />
          <p className="text-xl font-bold">Programming Languages</p>
        </div>
        <ArrowBigRight size={45} className="text-white ml-2" />
        <div>
          <div className="ml-15 flex gap-10 text-2xl items-center">
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-html flex gap-2 items-center">
              <i class="devicon-java-plain colored text-4xl"></i><span className="text-white">Basic </span>Java</span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-css flex gap-2">
            <i class="devicon-c-original"></i></span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-js flex gap-2 items-center">
            <i class="devicon-python-plain colored"></i>Python</span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-indigo-500 flex gap-2 items-center">
            <i class="devicon-php-plain colored text-5xl"></i>PHP</span>
          </div>
        </div>
      </div>
      
      {/* Skills Tile 3 */}
      <div className="flex items-center gap-10 mt-10">
        <div className="border-l-8 border-css rounded-lg bg-styling2 inline-block py-2 px-4 text-center font-mono tracking-widest">
          <Database size={30} className="m-auto mb-2" />
          <p className="text-xl font-bold">Database and Tools</p>
        </div>
        <ArrowBigRight size={45} className="text-white ml-2" />
        <div>
          <div className="ml-15 flex gap-10 text-2xl items-center">
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-css flex gap-2 items-center">
            <i class="devicon-mysql-original colored text-4xl"></i>MySQL</span>
            <span className="w-2 h-2 rounded-full bg-white"></span>
            <span className="text-green-600 flex gap-2">
            <i class="devicon-mongodb-plain colored text-4xl"></i>MongoDB</span>
          </div>
        </div>
      </div>
    </Common>
  );
}

export default Skills;