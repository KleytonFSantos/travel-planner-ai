import { useState } from 'react'
import Datepicker from "tailwind-datepicker-react"

type PropsType = {
    text: string
}

const DatepickerPlanner = ({ text }: PropsType) => {
    const [show, setShow] = useState(false)

    const options = {
        title: {text},
        autoHide: true,
        todayBtn: false,
        clearBtn: true,
        maxDate: new Date("2030-01-01"),
        minDate: new Date("1950-01-01"),
        theme: {
            background: "bg-zinc-200 dark:bg-gray-800",
            todayBtn: "",
            clearBtn: "",
            icons: "",
            text: "",
            input: "",
            inputIcon: "",
            selected: "",
        },
        icons: {
            // () => ReactElement | JSX.Element
            prev: () => <span>Previous</span>,
            next: () => <span>Next</span>,
        },
        datepickerClassNames: "top-12",
        defaultDate: new Date(),
        language: "pt-BR",
    }

    const handleChange = (selectedDate: Date) => {
		console.log(selectedDate)
	}

	const handleClose = (state: boolean) => {
		setShow(state)
	}

  return (
        <Datepicker options={options} onChange={handleChange} show={show} setShow={handleClose} />
    )
}

export default DatepickerPlanner
