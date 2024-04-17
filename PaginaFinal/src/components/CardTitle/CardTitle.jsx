import React from 'react'

const CardTitle = ({text}) => {
    return (
        <>
            <div className='flex justify-center p-8'>
                <div className='flex bg-blue-300 w-auto h-auto p-6 justify-center rounded-xl hover:scale-110 hover:animate-bounce hover:cursor-none transition duration-300'>
                    <p className='font-semibold text-3xl'>
                        {text}
                    </p>
                </div>
            </div>
        </>
    )
}

export default CardTitle
