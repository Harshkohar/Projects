import './App.css';
import AboutMe from './components/AboutMe';
import Description from './components/Description';
import Header from './components/Header';
import ProfileCard from './components/ProfileCard';
import Projects from './components/Projects';
import Skills from './components/Skills';

function App() {

  return (
    <>
      <Header />
      <div className="size-full bg-gray-900">
        <h1 className='text-styling1 text-5xl font-bold text-center p-5 tracking-widest !font-ubuntu'>Developer</h1>
        <div className='w-5/6 m-auto h-80 flex flex-row gap-30'>
          <ProfileCard />
          <Description />
        </div>
      </div>
      <AboutMe />
      <Skills />
      <Projects />
    </>
  )
}

export default App
