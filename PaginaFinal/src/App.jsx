import { useState } from 'react'
import './App.css'
import CardTitle from './components/CardTitle/CardTitle'

function App() {
  return (
    <>
      <div className=''>
        <CardTitle text={'Hola mundo'} />
      </div>
      <div className='p-8'>
        <div className='flex justify-center bg-gray-400 rounded-full'>
          <CardTitle text={'Hola a todos'} />
        </div>
      </div>
      <div className='p-8'>
        <div className='grid md:flex justify-around bg-gray-400 rounded-full p-16 md:p-0'>
          <CardTitle text={'¿Listos?'} />
          <CardTitle text={'Es su turno!'} />
        </div>
      </div>
    </>
  )
}

export default App
