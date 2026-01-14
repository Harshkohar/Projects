import { Mail, MapPin, Briefcase, Phone, Download } from "lucide-react";
function ProfileCard() {
  return <>
    <div className="border-t-3 border-l-3 rounded-tl-10xl border-sky-500 h-fit basis-1/3">
      <div className="h-fit p-7 text-center text-white border-2 rounded-tl-10xl rounded-br-10xl shadow-lg">
        <div className="font-mono">
          <img src="/Harsh Kohar.jpg" alt="" className="w-30 h-40 rounded-full m-auto border-2 border-styling1" />
          <h1 className="text-3xl mt-2 font-bold">Harsh</h1>
          <p className="text-styling2 text-base">Front-End Developer</p>
          <ul className="mt-4 text-sm ml-3 info-list">
            <li className="flex items-center gap-5"><Mail size={16} className="text-sky-400" /> <p>harshkohar.2004@gmail.com</p></li>
            <li className="flex items-center gap-5"><MapPin size={16} className="text-sky-400" /> <p>Hisar, Haryana</p></li>
            {/* <li className="flex items-center gap-5"><Briefcase size={16} /> <p>harshkohar.2004@gmail.com</p></li> */}
            <li className="flex items-center gap-5"><Phone size={16} className="text-sky-400" /> <p>+91-8168438607</p></li>
          </ul>
        </div>
        <a href="/HarshKohar.pdf" download className="bg-white text-black box-border p-3 flex items-center gap-3 rounded-2xl mt-3 ml-3   w-fit">Download Resume <Download size={16} className="text-sky-400" /></a>
      </div>
    </div>
  </>
}

export default ProfileCard;