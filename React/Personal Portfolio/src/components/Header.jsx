import linkedinLogo from "../assets/icon-linkedin.svg";
import githubLogo from "../assets/github.svg";
function Header() {
  return (
    <>
      <div className="bg-gray-900">
        <div className="w-5/6 h-24 flex m-auto justify-between items-center border-b-2 border-Grey">
          <div className='text-white text-2xl'>Harsh <span className='text-styling1'>Kohar</span></div>
          <div className='text-white'>
            <ul className='flex gap-4.5 social'>
              <li><a href="#">Home</a></li>
              <li><a href="#">Contact</a></li>
              <li><img src={linkedinLogo} alt="LinkedIn Logo" /><a href="https://www.linkedin.com/in/harsh-kohar/" target="_blank">LinkedIn</a></li>
              <li><img src={githubLogo} alt="Github Logo" /><a href="https://github.com/Harshkohar/Projects" target="_blank">Github</a></li>
            </ul>
          </div>
        </div>
      </div>
    </>
  )
}

export default Header;