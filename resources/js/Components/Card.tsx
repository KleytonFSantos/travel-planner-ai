import DatepickerPlanner from "@/Components/DatepickerPlanner";
import {PropsWithChildren, ReactNode} from "react";

type CardProps = {
    text: string,
    icon?: ReactNode
}
const Card = ({ children, text, icon }: PropsWithChildren<CardProps>) => {
    return (
        <div className=" max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-8">{ text }</h5>
            <div className="relative max-w-sm">
                { icon }
                { children }
            </div>
        </div>
    );
}
export default Card;
