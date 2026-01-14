import Common from "./Common";
import { ShoppingCartIcon } from "lucide-react";
function Projects() {
  return (
    <Common overlayColor="bg-background1/80" title="Projects" backgroundImage="/projects.jpg">
      <div className="flex items-center justify-center mt-3.5">
        <span className="w-2 h-2 rounded-full bg-styling1"></span>
        <span className="bg-styling1 w-48 h-0.5"></span>
        <span className="w-2 h-2 rounded-full bg-styling1"></span>
      </div>
      <p className="font-mono text-white mt-3 text-center">I had the pleasure of working with these awesome projects</p>
      <div className="mt-5">
        <div className="flex items-center gap-3">
          <ShoppingCartIcon className="text-js" size={32} />
          <p className="text-2xl text-white font-bold">E-Commerce Website : -</p>
        </div>
        <img src="/Ecommerce.png" alt="" className="rounded-2xl w-150 h-80 mt-5" />
        <p className="text-white font-bold mt-5">TECH Stack -</p>

      </div>
    </Common>
  )

}

export default Projects;