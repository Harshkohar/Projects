import { Mail} from "lucide-react";
function Description() {
  return <>
    <div className="h-full basis-2/3">
      <p className="text-styling1 my-4">&lt;h1&gt;</p>
      <div className="text-4xl text-white ml-5">
        <p className="tracking-widest !font-ubuntu">Hey</p>
        <p>I'm <span className="text-styling1 tracking-widest !font-ubuntu">Harsh</span>,</p>
        <p className="tracking-widest !font-ubuntu">Front-End Developer </p>
      </div>
      <p className="text-styling1 mt-4 mb-5">&lt;/h1&gt;</p>
      <p className="text-styling1 mt-4 mb-3">&lt;p&gt;</p>
      <p className="text-white ml-5">I help business grow by crafting amazing web experiences. If you’re looking for a developer that likes to get stuff done,</p>
      <p className="text-styling1 my-3">&lt;/p&gt;</p>
      <p className="text-styling1 text-3xl tracking-wider flex gap-4 items-center !font-mono">Let's Talk <div className="bg-gray-600 rounded-4xl p-2"><a href="mailto:harshkohar.2004@gmail.com"><Mail size={24} className="text-styling1"/></a></div></p>
    </div>
  </>
}

export default Description;